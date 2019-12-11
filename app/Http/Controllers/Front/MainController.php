<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Client;
use App\Models\Contact;
use Auth;
class MainController extends Controller
{
    public function home(Request $request){
        $client=Client::first();
        auth('client')->login($client);
        
        $posts=Post::take(9)->get();
       return view('front.home',compact('posts')); 
    }

    public function about(){
    return view('front.about'); 
     }

     public function whoWeAre(){
        return view('front.who'); 
         }

         public function artical(Request $request){
            $posts=Post::take(9)->get();
            $record= Post::where('id',$request->id)->first();
            // dd($request);
            return view('front.artical')->with([
             'posts'=>$posts,
             'record'=>$record,
            ]); 
             }

         public function contactUs(){
            // $governorates=Governorate::all();
            // return view('front.register',compact('governorates'));
            return view('front.contactus');  
             }


             public function contactUsSave(Request $request){

                $rules=[
                    'name'=>'required',
                    'email'=>'required|min:8',
                    'phone'=>'required',
                    'subject'=>'required',
                    'message'=>'required',
                    ];
             
                    $messages=[
                     'name.required'=>'Name is required',
                     'email.required'=>'email is required',
                     'phone.required'=>'phone is required',
                     'subject.required'=>'subject is required',
                     'message.required'=>'message is required',
                    
                     
                     
                 ];
                 $this->validate($request,$rules,$messages);
                 $records=Contact::create($request->all( ));
                
                 $records->save();
                 
                 
                 flash()->success("We Got Your Message");
             
                 return redirect(route('contact-us'));
                
                 }




     public function toggleFavourite(Request $request){
        $posts = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success',[

            'posts'=>$posts,
            



        ]);
         }
         
}
