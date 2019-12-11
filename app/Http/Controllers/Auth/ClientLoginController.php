<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Auth;

class ClientLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:client',['except'=>['logout']]);
    }

    public function showLoginForm(){
        return view('auth.client-login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'phone'=>'required',
            'password'=>'required',
        ]);
        $client =Client::where('phone',$request->phone)->first();
   
        if($client && $client->is_activate==true){

        if ( Auth::guard('client')->attempt(['phone'=>$request->phone,'password'=>$request->password],$request->remember)) {
            return redirect()->intended(route('main'));
        }}
        
        return redirect()->back()->withInput($request->only('phone','remember'));
    }




//     $validator=validator()->make($request->all(),[
//         'phone'=>'required',
//        'password'=>'required',

//         // return $request->all( );

//     ]);
//     if($validator->fails()){
//        return responseJson(0,$validator->errors()->first(),$validator->errors());


//     }
//     $client =Client::where('phone',$request->phone)->first();
   
//    if($client && $client->is_activate==true){


//     // if ($request->has('is_active')) {
//     //     $request->user()->where('is_active','=',0)
//     //  }


//     if (Hash::check($request->password,$client->password)) {
//         return redirect()->intended(route('clienthome'));
//         }
//     else {
//         return redirect()->back()->withInput($request->only('phone'));
 
//     }

// }
// else {
//     return redirect()->back()->withInput($request->only('phone'));
//    }


//     }


public function logout()
    {
        Auth::guard('client')->logout();

        return redirect('/');
    }
}
