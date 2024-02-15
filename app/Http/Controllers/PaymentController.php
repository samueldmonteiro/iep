<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $token;

    public function __construct()
    {
        $this->token = "APP_USR-1105463720153764-021011-2bf0810ab2c76a934f1b4e4aa04754ca-1387127053";
    }

    public function qrcodePix(Request $request)
    {

        $pay = new Payment();

        $pay->value = 1.22;
        $pay->status = 'pending';
        $pay->subscribe_id = random_int(1, 100);
        $pay->save();

        if ($pay) {


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
                "external_reference": "' . $pay->id . '",
                "notification_url": "https://google.com",
                "payer": {
                    "email": "test_user_123@testuser.com",
                    "identification": {
                    "type": "CPF",
                    "number": "95749019047"
                    }
                },
                "payment_method_id": "pix",
                "transaction_amount": ' . $pay->value . '
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

                    /**echo "<h3>{$transaction_amount} #{$external_reference}</h3> <br />";
                    echo "<img src='data:image/png;base64, {$img_qrcode}' width='200' /> <br />";
                    echo "<textarea>{$copia_cola}</textarea> <br />";
                    echo "<a href='{$link_externo}' target='_blank' >Link externo</a>";**/
                }
            }
        }
    }

    public function paymentAccept(Request $r)
    {
        $payment = Payment::where('email', $r->email)->first();

        if ($payment->payment == "pending") {
            return false;
        }
        return true;
    }
}
