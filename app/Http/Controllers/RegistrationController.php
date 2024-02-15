<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{

    private $amount;
    private $token;

    public function __construct()
    {
        $this->amount = 0.5;
        $this->token = "APP_USR-1105463720153764-021011-2bf0810ab2c76a934f1b4e4aa04754ca-1387127053";
    }

    /**
     * Display a listing of the resource.
     */

    private function subscribeCurl(Registration $reg)
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
                "external_reference": "' . $reg->id . '",
                "notification_url": "' . url('/notificationpayment') . '",
                "payer": {
                    "email": "test_user_123@testuser.com",
                    "identification": {
                    "type": "CPF",
                    "number": "95749019047"
                    }
                },
                "payment_method_id": "pix",
                "transaction_amount": ' . $this->amount . '
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
                    'amount' => $transaction_amount,
                    'ext_reference' => $external_reference
                ]);
            }
        }
    }

    public function subscribe(Request $r)
    {

        if (Registration::where('email', $r->email)->where('payment', 'approved')->first()) {
            return json_encode(['subscribe' => 'exists']);
        }

        $registration = null;
        if (Registration::where('email', $r->email)->first()) {
            $registration = Registration::where('email', $r->email)->first();
        } else {
            $registration = new Registration();
            $registration->name = $r->name;
            $registration->email = $r->email;
            $registration->cpf = $r->cpf;
            $registration->telphone = $r->telphone;
            $registration->course_id = $r->course_id;
            $registration->polo_id = $r->polo_id;
            $registration->payment = "pending";
            if (!$registration->save()) {
                return json_encode('error');
            };
        }

        return  $this->subscribeCurl($registration);
    }

    public function checkPayment(Request $r)
    {
        $payment = Registration::where('email', $r->email)->first();

        $resp = true;
        if ($payment->payment == "pending") {
            $resp = false;;
        }
        return json_encode(['payment' => $resp]);
    }


    public function notificationPayment(Request $r)
    {
        if (isset($r->id)) {

            $id = $r->id;

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
            }
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
