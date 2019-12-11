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

                 flash()->success("success change");
        //return back();//this function like redirect() but in the same page
                return redirect()->to('/editpassword');

      
    } 



}
