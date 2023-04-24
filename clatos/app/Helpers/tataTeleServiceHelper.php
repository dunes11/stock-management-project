<?php

namespace App\Helpers;

use Illuminate\Http\Client\Response;

class Tatatele
{

            public static function initCall($callToNumber, $callerNumber)
            {

                        $callerDid = array(); //Settings::where('name', 'tatatele_caller_did')->first();
                        $authKey = array(); //Settings::where('name', 'tatatele_auth_key')->first();

                        $callerDid = trim($callerDid['value']);
                        $authKeyString = trim($authKey['value']);
                        $curl = curl_init();
                        curl_setopt_array($curl, [
                                    CURLOPT_URL => "https://api-cloudphone.tatateleservices.com/v1/click_to_call",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS => "{\"agent_number\":\"" . $callerNumber . "\",\"destination_number\":\"" . $callToNumber . "\",\"caller_id\":\"" . $callerDid . "\"}",
                                    CURLOPT_HTTPHEADER => [
                                                "Accept: application/json",
                                                "Authorization:  $authKeyString  ",
                                                "Content-Type: application/json"
                                    ],
                        ]);
                        $res = curl_exec($curl);
                        $err = curl_error($curl);
                        curl_close($curl);
                        if ($err) {
                                    return ['status' => false, "msg" => 'Something went wrong while initiating call.'];
                        } else {
                                    $res = json_decode($res, true);
                                    return ['status' => true, 'data' => $res];
                                    // return response()->json(["msg" => $res['message']]);
                        }
            }
}
