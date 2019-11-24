<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class ChangePasswordController extends Controller
{


    public function index()
    {
      return view('editadminpassword.index');
    }  

    public function changeAdminPassword(Request $request)
    {
        $rules=[
            'current-password' => 'required',
           'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
            ];
     
            $messages=[
                'current-password.required' => 'Please enter current password',
              'password.required' => 'Please enter password',
             
         ];
         
         $validator = $this->validate($request,$rules,$messages);
        

                 $user = auth()->user();
                 if(Hash::check($request->input('current-password'),$user->password))
                 {
                     $user->password = bcrypt($request->input('password'));
                     $user->save();
                    
                 }
                 flash()->success("success Edited");
        //return back();//this function like redirect() but in the same page
       return redirect()->to('/home');

        //  if(Auth::Check())
        //    {
        //      $request_data = $request->All();
        //      $validator = $this->validate($request,$rules,$messages);
        //      if($validator->fails()){
        //         return responseJson(0,$validator->errors()->first(),$validator->errors());
        
        
        //      }
        //      else
        //      {  
        //        $current_password = Auth::User()->password;           
        //        if(Hash::check($request_data['current-password'], $current_password))
        //        {           
        //          $user_id = Auth::User()->id;                       
        //          $obj_user = User::find($user_id);
                 
        //          $obj_user->password = $request->merge(['password'=>bcrypt($request->password)]);
        //          $obj_user->save(); 
        //          return back(); 
        //        }
        //        else
        //        {           
        //          $error = array('current-password' => 'Please enter correct current password');
        //          return response()->json(array('error' => $error), 400);   
        //        }
        //      }        
        //    }
        //    else
        //    {
              
        //      return view('editadminpassword.index');
        //      // return back(); 
        //     // return redirect()->to('/');
        //    }    
         
    } 



}
