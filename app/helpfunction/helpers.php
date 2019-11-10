<?php


    function responseJson($satus,$message,$data=null)
    {
        $response=[
            'status'=>$satus,
            'message'=>$message,
            'data'=>$data,
           ];
         return response()->json($response);

         
    }

   

