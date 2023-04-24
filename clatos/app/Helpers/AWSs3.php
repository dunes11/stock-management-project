<?php

namespace App\Helpers;

use Aws\S3\S3Client;

class AWSs3
{


            static  function Call_s3()
            {
                        return   new S3Client([
                                    "version" => "latest",
                                    //   "region" => hostData()->aws_default_region, // Change to your own region
                                    "region" => 'ap-south-1', // Change to your own region

                                    "http" => ["verify" => false],
                                    'credentials' => [
                                                'key'    => hostData()->aws_access_key_id,
                                                'secret' => hostData()->aws_secret_access_key,
                                    ]
                        ]);
            }

            public static function upload($source, $filenewname, $makepublic = 'no')
            {

                        $type = [true, 1];
                        if (in_array($makepublic, $type, true)) {
                                    $result = AWSs3::Call_s3()->putObject([
                                                'Bucket' => hostData()->aws_bucket,
                                                'Key'    => $filenewname,
                                                'Body'   => fopen($source, 'r'),
                                                'ACL'    => 'public-read', // make file 'public'
                                    ]);
                                    return ['url' => $result['ObjectURL']];
                        } else { // not available for public
                                    $result = AWSs3::Call_s3()->putObject([
                                                'Bucket' => hostData()->aws_bucket,
                                                'Key'    => $filenewname,
                                                'Body'   => fopen($source, 'r'),
                                    ]);
                        }

                        return ['data' => $result];
            }

            public static function show($filename)
            {
                        $expiry = "+1 days";
                        $command = AWSs3::Call_s3()->getCommand(
                                    'GetObject',
                                    [
                                                'Bucket' =>  hostData()->aws_bucket,
                                                'Key' => $filename,
                                    ]
                        );
                        $request =  AWSs3::Call_s3()->createPresignedRequest($command, $expiry);

                        return ($request->getUri());
            }

            public static function delete($filename)
            {
                        $result = AWSs3::Call_s3()->deleteObject(array(
                                    'Bucket' => hostData()->aws_bucket,
                                    'Key'    => $filename
                        ));
                        return $result;
            }
}
