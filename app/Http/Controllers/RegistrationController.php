<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\CoursePolo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class RegistrationController extends Controller
{

    private $amount;
    private $token;

    public function __construct()
    {
        $this->amount = 0.5;
        $this->token = "APP_USR-7372684676678375-022008-aad16a298b9e357748487f8bfe49f800-1387127053";
    }

    /**
     * Display a listing of the resource.
     */

    private function subscribeCurl(Registration $reg, $regPrice)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "description": "Payment for product",
        "external_reference": "'.$reg->id.'",
        "notification_url": "'. url('notificationpayment') .'",
        "payer": {
            "email": "test_user_123@testuser.com",
            "identification": {
            "type": "CPF",
            "number": "95749019047"
            }
        },
        "payment_method_id": "pix",
        "transaction_amount": ' . $regPrice . '
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token
        ),
    ));


        $response = curl_exec($curl);
        curl_close($curl);

        $obj = json_decode($response);

        if (isset($obj->id)) {
            if ($obj->id != NULL) {

                $copia_cola = $obj->point_of_interaction->transaction_data->qr_code;
                $img_qrcode = $obj->point_of_interaction->transaction_data->qr_code_base64;
                $link_externo = $obj->point_of_interaction->transaction_data->ticket_url;
                $transaction_amount = $obj->transaction_amount;
                $external_reference = $obj->external_reference;

                return json_encode([
                    'copy_paste' => $copia_cola,
                    'qrcode' => "data:image/png;base64, {$img_qrcode}",
                    'amount' => 'R$ '. number_format($transaction_amount, 2, ','),
                    'ext_reference' => $external_reference,
                    'registration_id' => $reg->id
                ]);
            }
        }

        return json_encode(['nao foi possivel ter qrcode']);
    }

    public function subscribe(Request $r)
    {

        if (Registration::where('email', $r->email)->where('payment', 'approved')->first()) {
            return json_encode(['info' => 'Seu Pagamento já foi Aprovado!']);
        }

        if(in_array('', $r->all())){
                return json_encode(['error'=> 'Preencha Todos com Campos ABAIXO!']);
        }
        $registration = null;
        if (Registration::where('email', $r->email)->where('course_id', $r->course_id)->where('polo_id', $r->polo_id)->first()) {
            $registration = Registration::where('email', $r->email)->first();
        } else {

            $registration = new Registration();
            $registration->name = $r->name;
            $registration->email = $r->email;
            $registration->cpf = $r->cpf;
            $registration->rg = $r->rg;
            $registration->birthday = $r->birthday;
            $registration->civilstate = $r->civilstate;
            $registration->telphone = $r->telphone;
            $registration->course_id = $r->course_id;
            $registration->polo_id = $r->polo_id;
            $registration->payment = "pending";
            if (!$registration->save()) {
                return json_encode('error');
            };
        }

        $regPrice = CoursePolo::where('course_id', $r->course_id)->where('polo_id', $r->polo_id)->first()->registration_price;
        if($regPrice <= 0){
            return json_encode(['free' => true, 'idReg'=> $registration->id]);
        }else{
            return  $this->subscribeCurl($registration, $regPrice);
        }
    }

    public function checkPayment(Request $r)
    {
        $payment = Registration::find($r->id);

        $resp = true;
        if ($payment->payment == "pending") {
            $resp = false;
        }
        return json_encode(['payment' => $resp]);
    }


    public function notificationPayment(Request $r)
    {
        Log::build([
          'driver' => 'single',
          'path' => storage_path('logs/custom.log'),
        ])->info($r->all());

        if($r->type == "payment" && $r->action == "payment.updated") {

            $id = $r->id;

            if(isset($_POST['data']['id'])){
                $id = $_POST['data']['id'];
            }
            else if(isset($r->data->id)){
                $id = $r->data->id;
            }else if(isset($r->data_id)){
                $id = $r->data_id;            
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/' . $id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $this->token
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $payment = json_decode($response);
            $reg = Registration::find($payment->external_reference);

            if ($payment->status == "approved") {
                $reg->payment = "approved";
                $reg->save();
                return json_encode(['status'=>true]);
            }
        }
    }

    public function successRegister(Request $request)
    {
        return view('front.successRegister', [
            'registration' => Registration::find($request->id)
        ]);
    }


    public function destroy(Request $r)
    {
        Registration::find($r->registration)->delete();
        return redirect()->back();
    }
}
