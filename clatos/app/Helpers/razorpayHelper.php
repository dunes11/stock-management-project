<?php

namespace App\Helpers;

class Razorpay
{
            public static $razorpay_key_id = 'rzp_live_aAqv7iAxvkKtvT';
            public static $razorpay_secret_key = 'SW0Bl7bCowtbhQl7WTS1ZqsO';
            public static function virtualAccount()
            {
                        $razorPayAuthKeyString = static::$razorpay_key_id . ':' . static::$razorpay_secret_key;
                        $razorPayAuthKey = base64_encode($razorPayAuthKeyString);
                        $curl = curl_init();
                        curl_setopt_array($curl, [
                                    CURLOPT_URL => 'https://api.razorpay.com/v1/virtual_accounts',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS => '{"receivers":{"types":["bank_account"]},"description":"Razorpay Virtual Account created.","close_by":"2147483647"}',
                                    CURLOPT_HTTPHEADER => ['Content-Type: application/json', 'Authorization: Basic ' . $razorPayAuthKey],
                        ]);
                        $response = curl_exec($curl);
                        curl_close($curl);
                        return   $response = json_decode($response, true);
            }
}
