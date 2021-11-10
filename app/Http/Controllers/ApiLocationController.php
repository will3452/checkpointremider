<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class ApiLocationController extends Controller
{
    public function sendMessage(User $user, Checkpoint $checkpoint)
    {
        $ch = curl_init();
        $parameters = array(
            'apikey' => config('semaphore.api_key'),
            'number' => $user->mobile_number,
            'message' => "hello, $user->name you're about to checkpoint please ready the following requirement(s) : ".implode(', ', $checkpoint->requirements()->pluck('description')->toArray()),
            'sendername' => config('semaphore.sender_name')
        );
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);

        //Send the parameters set above with the request
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

        // Receive response from server
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
    }
    public function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $pi = pi();
        $x = sin($lat1 * $pi/180) *
         sin($lat2 * $pi/180) +
        cos($lat1 * $pi/180) *
        cos($lat2 * $pi/180) *
        cos(($lng2 * $pi/180) - ($lng1 * $pi/180));

        $x = atan((sqrt(1 - pow($x, 2))) / $x);
        return abs((1.852 * 60.0 * (($x/$pi) * 180)) / 1.609344) * 1609.34; // m
    }

    public function checkLocation()
    {
        $user = User::find(auth()->user()->id);
        $checkpoints = Checkpoint::get();

        foreach ($checkpoints as $checkpoint) {
            $distance = $this->getDistance(
                request()->lat,
                request()->lng,
                $checkpoint->lat,
                $checkpoint->long
            );

            if ($distance <= 500) {
                if ($user->sendable) {
                    $this->sendMessage($user, $checkpoint);
                    $user->update(['sendable'=>false]); //update flag
                }
                return response([
                    'message'=>'sms sent',
                    'distance'=>$distance,
                    'your_position'=>[
                        'lat'=>request()->lat,
                        'lng'=>request()->lng,
                    ],
                    'checkpoint'=>[
                        'position'=>[
                            'lat'=>$checkpoint->lat,
                            'lng'=>$checkpoint->long,
                        ],
                        'requirements'=>$checkpoint->requirements()->pluck('description')
                    ]
                    ]);
            }
        }
        if (!$user->sendable) {
            $user->update(['sendable'=>true]); //update flag
        }
        return response([
            'message'=>'not in area',
        ], 200);
    }
}
