<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Auth;
use paytm\paytmchecksum\PaytmChecksum;


class Paytm
{
    // public $paytm;
    public static  $paytmMKey = 'gFXfVcbdik4%wVnO';
    public static  $paytmMid = 'fyPQCf17929841604008';

    public static function qr(int $amount)
    {
        if ($amount <= 5) {
            throw new Exception('Invalid Amount');
            // return $e;
        }
        // dd($amount );
        $orderId = 'DF' . time() . substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1, 10))), 1, 3);
        // return  static::$paytmMid;
        $paytmParams['body'] = [
            'mid' => static::$paytmMid,
            'orderId' => $orderId,
            // 'orderId' => 'DF1677825391HSo',
            'amount' => "$amount",
            'businessType' => 'UPI_QR_CODE',
            'posId' => 'S12_123',
            'orderDetails' => 'Payment for order',
            'displayName' => 'DUNES FACTORY',
        ];

        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams['body'], JSON_UNESCAPED_SLASHES), static::$paytmMKey); //hostData()->paytmMKey
        $paytmParams['head'] = [
            'clientId' => 'LEAD_' . 100,
            'version' => 'v1',
            'signature' => $checksum,
        ];
        // dd($paytmParams);
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
        /* for Staging */
        // $url = "https://securegw-stage.paytm.in/paymentservices/qr/create";
        /* for Production */
        $url = 'https://securegw.paytm.in/paymentservices/qr/create';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        // dd($amount);
        $data = json_decode($response, true);

        // dd($data['body']['resultInfo']['resultStatus']=='FAILURE');
        if ($data['body']['resultInfo']['resultStatus'] == 'FAILURE') {
            return ['status' => false];
        }

        $order_details = parse_url($data['body']['qrData']);

        // dd($order_details);
        $q_str = parse_str($order_details['query'], $ord_dtl_ary);
        $qrString = 'data:image/jpeg;base64,' . $data['body']['image'];
        return ['status' => true, 'response' => $response, 'qr' => $qrString, 'string' => $q_str, 'orderId' => $orderId];
    }
    public static function gateway(int $amount)
    {

        $orderId = 'DF' . time() . substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1, 10))), 1, 3);
        $paytmKey = static::$paytmMKey;
        $paytmMid = static::$paytmMid;
        $callbackUrl = '/';
        $companyName = '';
        $paytmGW = [];
        $paytmGW['body'] = [
            'requestType' => 'Payment',
            'mid' => $paytmMid,
            'websiteName' => "$companyName",
            'orderId' => $orderId,
            'callbackUrl' => "$callbackUrl",
            'txnAmount' => [
                'value' => $amount,
                'currency' => 'INR',
            ],
            'userInfo' => [
                'custId' => 'LEAD_100',
            ],
        ];
        $checksum2 = PaytmChecksum::generateSignature(json_encode($paytmGW['body'], JSON_UNESCAPED_SLASHES), $paytmKey);
        $paytmGW['head'] = [
            'signature' => $checksum2,
        ];

        $post_data = json_encode($paytmGW, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        //$url2 = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=" . hostData()->paytm_merchant_mid . "&orderId=" . $orderId;

        /* for Production */
        $url2 = 'https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=' . $paytmMid . '&orderId=' . $orderId;
        // dd($url2);
        $ch = curl_init($url2);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        // dd($url2);
        $response = json_decode($response, true);
        // if (curl_errno($ch)) {
        //     return     $error_msg = curl_error($ch);
        // }
        if ($response['body']['resultInfo']['resultStatus'] == 'F') {
            return ['status' => false];
        }
        // dd($response['body']['resultInfo']['resultStatus'] == 'F');
        $paytmTxnToken  = $response['body']['txnToken'];
        return ['status' => true, 'response' => $response, 'paytmTxnToken' => $paytmTxnToken, 'orderId' => $orderId, 'amount' => $amount];
    }
}
