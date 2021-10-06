<?php
namespace App\Helpers;


trait ApiResponser{

    //Return an Success JSON Response
    protected function success($data,string $message=null,int $code=200)
    {
        return response()->json([
            'status' => 'Success',
            'message'=> $message,
            'data' =>$data,
        ],$code);
    }
    //Return an Error JSON Response
    protected function error($data,string $message=null, int $code=200)
    {
        return response()->json([
            'status' => 'Error',
            'message' =>$message,
            'data' => $data,
        ],$code);
    }
}
