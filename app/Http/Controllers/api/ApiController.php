<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'data' => $result,
            'success'=>true,
            'message'=>$message,
        ];

        return response()->json($response, 200);
    }


    public function sendError($error, $errorMessages=[]){
        $response=[
            'data'=>null,
            'success'=>false,
            'message'=>$error,
        ];

        if(!empty($errorMessages)){
            $response['message']=$errorMessages;
        }

        return response()->json($response);
    }
}
