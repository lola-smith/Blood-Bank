<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Token;
use App\Mail\ResetPassowrd;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    //
    public function register(Request $request){

     $validator=validator()->make($request->all( ),[
         'name'=>'required',
         'email'=>'required|min:8|unique:clients',
         'phone'=>'required|unique:clients',
         'dob'=>'required',
         'blood_type_id'=>'required',
         'city_id'=>'required',
         'last_donation_date'=>'required',
         'password'=>'required|confirmed',

         // return $request->all( );

     ]);
     if($validator->fails()){
        return responseJson(0,$validator->errors()->first(),$validator->errors());


     }
     $request->merge(['password'=>bcrypt($request->password)]);//make decreption
     $client=Client::create($request->all( ));
     $client->api_token=str_random(60);
     $client->save();
     return responseJson(1,'you registered sucessfully',[

        'api_token'=>$client->api_token,
        'client'=>$client,
     ]);
    }

    public function login(Request $request){

        $validator=validator()->make($request->all(),[
            'phone'=>'required',
           'password'=>'required',
   
            // return $request->all( );
   
        ]);
        if($validator->fails()){
           return responseJson(0,$validator->errors()->first(),$validator->errors());
   
   
        }
        $client =Client::where('phone',$request->phone)->first();

       if($client && $client->is_activate==true){


        // if ($request->has('is_active')) {
        //     $request->user()->where('is_active','=',0)
        //  }


        if (Hash::check($request->password,$client->password)) {
            return responseJson(1,'you login sucessfully',[

                'api_token'=>$client->api_token,
                'client'=>$client,
             ]);
            }
        else {
            return responseJson(0,'fail to login');
     
        }

    }
    else {
        return responseJson(0,'fail to login');
       }


}


public function resetPassword(Request $request){

    $validator=validator()->make($request->all(),[

        'phone'=>'required',
        // 'pin_code'=>'required',
        // 'password'=>'required|confirmed',

        // return $request->all( );

    ]);
    if($validator->fails()){
       return responseJson(0,$validator->errors()->first(),$validator->errors());


    }
    $client =Client::where('phone',$request->phone)->first();

   if($client){
       $code=rand(1111,9999);
       $update=$client->update(['pin_code'=>$code]);
    if ($update) {

        Mail::to($client->email)
    
    ->bcc("lolasmithw@gmail.com")
    ->send(new ResetPassowrd($client));
        return responseJson(1,'الرجاء فحص الميل',['pin_code_for_test'=>$code,
        // لمعرفة من المرسل
        'email'=>$client->email,
        // لمعرفه الاخطاء في بعت الميل
        'mail_fails'=>Mail::failures(),
        
        ]);
        }
    else {
        return responseJson(0,'حدث خطأ');
 
    }

}
   else {
    return responseJson(0,'لايوجد حساب برقم الهاتف هذا ');
   }



}





// عايزه اعدل فيها ابعت الفون يتعرف على الشخص يعني


public function newPassword(Request $request){

    $validator=validator()->make($request->all(),[

        
        'pin_code'=>'required',
        'password'=>'required|confirmed',
        'phone'=>'required',

    ]);
    if($validator->fails()){
       return responseJson(0,$validator->errors()->first(),$validator->errors());


    }
    $client =Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->where('phone',$request->phone)->first();

   if($client){
       $client->password=bcrypt($request->password);

        $client->pin_code=null;
    if ($client->save()) {

       
        return responseJson(1,'تم تغيير بنجاح');
        }
    else {
        return responseJson(0,'حدث خطأ');
 
    }

}
   else {
    return responseJson(0,'هذا الكود غير صالح');
   }



}

public function profile(Request $request){
    //retraive and update data
  $profile_data=$request->user();
//dd($profile_data);   
 if ($request->has('password')) {
      
    $request->merge(['password'=>bcrypt($request->password)]);
    
     }
  
     $profile_data->update($request->all());
     return responseJson(1,'success',$profile_data);

}


public function registerNotificationToken(Request $request){
    $validator=validator()->make($request->all(),[
        'token'=>'required',
       'type'=>'required|in:android,ios',

        // return $request->all( );

    ]);
    if($validator->fails()){
       return responseJson(0,$validator->errors()->first(),$validator->errors());


    }
     
    Token::where('token',$request->token)->delete();//بمسحو علشان ميكونشي مربوط بأي يوزر تاني علشان بردو مع كل لوجن يكريت توكن تاني
    $request->user()->tokens()->create($request->all());
    //dd($request->user()->tokens);
    return responseJson(1,'success');
}




public function removeNotificationToken(Request $request){
    $validator=validator()->make($request->all(),[
        'token'=>'required',

    ]);
    if($validator->fails()){
       return responseJson(0,$validator->errors()->first(),$validator->errors());


    }
    Token::where('token',$request->token)->delete();//بمسحو علشان ميكونشي مربوط بأي يوزر تاني علشان بردو مع كل لوجن يكريت توكن تاني
    return responseJson(1,'deleted success');
}

}