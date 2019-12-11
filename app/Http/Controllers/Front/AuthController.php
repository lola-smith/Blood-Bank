<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\Client;
class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:client');
    }
    public function register(){
        
        // $governorates=Governorate::all();
        // return view('front.register',compact('governorates'));
        return view('front.register');  
         }

         public function registerSave(Request $request){

            // $validator=validator()->make($request->all( ),[
            //     'name'=>'required',
            //     'email'=>'required|min:8|unique:clients',
            //     'phone'=>'required|unique:clients',
            //     'dob'=>'required',
            //     'blood_type_id'=>'required',
            //     'city_id'=>'required',
            //     'last_donation_date'=>'required',
            //     'password'=>'required|confirmed',
       
            //     // return $request->all( );
       
            // ]);
            // if($validator->fails()){
            //    return responseJson(0,$validator->errors()->first(),$validator->errors());
       
       
            // }
            // $request->merge(['password'=>bcrypt($request->password)]);//make decreption
            // $client=Client::create($request->all( ));
            // $client->api_token=str_random(60);
            // $client->save();
            // return responseJson(1,'you registered sucessfully',[
       
            //    'api_token'=>$client->api_token,
            //    'client'=>$client,
            // ]);






            $rules=[
                'name'=>'required',
                'email'=>'required|min:8|unique:clients',
                'phone'=>'required|unique:clients',
                'dob'=>'required',
                'blood_type_id'=>'required',
                'city_id'=>'required',
                'last_donation_date'=>'required',
                'password'=>'required|confirmed',
                ];
         
                $messages=[
                 'name.required'=>'Name is required',
                 'email.required'=>'email is required',
                 'phone.required'=>'phone is required',
                 'dob.required'=>'dob is required',
                 'blood_type_id.required'=>'blood_type_id is required',
                 'city_id.required'=>'city_id is required',
                 'last_donation_date.required'=>'last_donation_date is required',
                 'password.required'=>'password is required',
                
                 
                 
             ];
             $this->validate($request,$rules,$messages);
             $request->merge(['password'=>bcrypt($request->password)]);//make decreption
            $client=Client::create($request->all( ));
            
            
            $client->save();
             
             
             flash()->success("you regist succseefully");
         
             return redirect(route('clienthome.login'));
             }
}
