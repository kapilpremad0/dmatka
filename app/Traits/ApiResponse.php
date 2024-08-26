<?php

namespace App\Traits;

trait ApiResponse
{
    function sendSuccess($message, $result = null)
    {
        $response = [
            // 'ResponseCode'  => 200,
            // 'Status'    => true,
            // 'Message' => $message,
            // 'Data' =>
             $result
        ];

        // if (!empty($result)) {
        //     // $response['Data'] = $result;
        // }
        
        return response()->json($result, 200);
    }

    function sendFailed($errorMessage , $code = 200)
    {
        $response = [
            // 'ResponseCode'  => $code,
        ];

        $error = [];
        if(is_array($errorMessage)){
            foreach($errorMessage as $key => $val){
                if(is_array($val)){
                    $error[$key] = $val[0];
                }else{
                    $error = $val;
                }
            }
        }else{
            $error = $errorMessage;
        }
        if (!empty($error)) {
            $response['Error'] = $error;
        }
        return response()->json($response, $code);
    }
    
}
