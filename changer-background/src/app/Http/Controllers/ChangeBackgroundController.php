<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class ChangeBackgroundController extends Controller
{
    public function submit(Request $request){
        if ($request->hasFile('image') && $request->hasFile('background')) {
            $main_image = $request->file('image');
            $background = $request->file('background');

            $imageName = 'image.png';
            $backgroundName = 'background.jpeg';
            Storage::disk('public')->put($imageName, file_get_contents($main_image));
            Storage::disk('public')->put($backgroundName, file_get_contents($background));

            $imageData = file_get_contents($main_image);
            $base64Encoded = base64_encode($imageData);

            $apiUrl = 'https://api.ximilar.com/removebg/precise/removebg';
            $apiKey = '6dda1bc7bf1eec16d8a442fa3b89449315fb2d48';

            $requestData = [
                'records' => [
                    [
                        '_base64' => $base64Encoded,
                        'binary_mask' => false,
                        'white_background' => false
                    ]
                ]
            ];

            $requestHeaders = [
                'Content-Type: application/json',
                'Authorization: Token ' . $apiKey
            ];

            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if ($response === false) {
                echo 'cURL Error: ' . curl_error($ch);
            }
            else {
                $responseArray = json_decode($response, true);
                $outputUrlWhitebg = $responseArray['records'][0]['_output_url'];
                $client = new Client();
                $response = $client->get($outputUrlWhitebg);
                $imageContent = $response->getBody()->getContents();
                Storage::disk('public')->put($imageName,$imageContent);


                $overlayData = file_get_contents(Storage::disk('public')->path($imageName));
                $backgroundData = file_get_contents(Storage::disk('public')->path($backgroundName));
                $background = imagecreatefromstring(base64_decode(base64_encode($backgroundData)));
                $overlay = imagecreatefromstring(base64_decode(base64_encode($overlayData)));

                $newWidth = 800;
                $newHeight = 600;

                $resizedBackground = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($resizedBackground, $background, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($background), imagesy($background));
                imagecopy($resizedBackground, $overlay, 0, 0, 0, 0, imagesx($overlay), imagesy($overlay));

                imagejpeg($resizedBackground, storage_path('app/public/' . 'output-img.jpeg'));

                if(Auth::check()){
                    $imagePath = storage_path('app/public/output-img.jpeg');
                    Storage::disk('public')->put(Auth::id() . '/' . uniqid() . '.jpg', file_get_contents($imagePath));
                }


                header('Content-Disposition: attachment; filename="output_image.jpg"');
                header('Content-Type: image/jpeg');
                imagejpeg($resizedBackground);
                imagedestroy($resizedBackground);
                imagedestroy($overlay);
            }

            curl_close($ch);
        }
        else{
            return 'Ошибка: Проверьте, что оба изображения выбраны.';
        }

    }


}
