<?php
namespace App\Traits;

trait ResponseJson
{
    public function responseJson($data, $code = 200,$headers = []): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, $code)->withHeaders($headers);
    }

    public function sendResponse($message , $result)
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 400)
    {
    	$response = [
            'success' => false,
            'message' => $error,
            'data'    => null,
        ];

        if(!empty($errorMessages)){
            $response['message'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
