<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\Category;
use App\Models\Contact;
use App\Models\BloodType;
use App\Models\Setting;
use App\Models\donationOrder;
use App\Models\Notification;




class MainController extends Controller
{
    //
     // private function apiResponse($satus,$message,$data=null)
    // {
    //     $response=[
    //         'status'=>$satus,
    //         'message'=>$message,
    //         'data'=>$data,
    //        ];
    //      return response()->json($response);

         
    // }

    public function governorates (){
        //dd(env('DB_PORT'));
        $governorates=Governorate::all();
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$governorates);
    }
      
    public function categories (){
        //dd(env('DB_PORT'));
        $categories=Category::all();
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$categories);
    }

    public function bloodTypes (){
        //dd(env('DB_PORT'));
        $blood_types=BloodType::all();
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$blood_types);
    }



    public function cities (Request $request){
        $cities =city::where(function($query) use($request){
          if($request->has('governorate_id')){
            $query->where('governorate_id',$request->governorate_id);

          }

        })->get();
        //return $this->apiResponse(1,'success',$cities );
        return responseJson(1,'success',$cities );
    }



    public function posts (){
        //dd(env('DB_PORT'));
        $posts=Post::with('category')->paginate(10);
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$posts);
    }


    //not compleet yet
    public function post(Request $request){
        $post=Post::where('id',$request->id)->first();
        // dd($request->id);
        
        return responseJson(1,'success',$post);
        }




    public function settings (){
        $settings=Setting::all();
        return responseJson(1,'success',$settings);
    }



   


    public function contacts(Request $request){

        $validator=validator()->make($request->all( ),[
            'name'=>'required',
            'email'=>'required|min:8',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
            
            // return $request->all( );
   
        ]);
        if($validator->fails()){
           return responseJson(0,$validator->errors()->first(),$validator->errors());
   
   
        }
       
        $client=Contact::create($request->all( ));
        
        $client->save();
        return responseJson(1,'you registered sucessfully',[
   
           
           'client'=>$client,
        ]);
       }






    public function donationOrders(){
        $donations=DonationOrder::all();
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$donations);
    
    }



    public function donationOrder(Request $request){
        $donation=DonationOrder::where('id',$request->id)->first();
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$donation);  
    
    }





    public function createDonationOrder(Request $request){
       
        $validator=validator()->make($request->all( ),[
            'patient_name'=>'required',
            'patient_age'=>'required',
            'bags_number'=>'required',
            'blood_type_id'=>'required',
            'hospital_name'=>'required',
            'city_id'=>'required',
            'hospital_address'=>'required',
            'patient_phone'=>'required',
            'client_id'=>'required',
            'notes'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
            // return $request->all( );
   
        ]);
        if($validator->fails()){
           return responseJson(0,$validator->errors()->first(),$validator->errors());
   
   
        }
       
        $donation_order=DonationOrder::create($request->all( ));
        $donation_order->save();
        return responseJson(1,'you orderd sucessfully',[
   
           
           'donatiOnorder'=>$donation_order,
        ]);
       }



//  public function notifications(){
//         $notefication=Notification::all();
//         //return $this->apiResponse(1,'success',$governorates);
//         return responseJson(1,'success',$notification);
    
//     }
       
 
    public function notifications(){
        $notification=Notification::paginate();
        //return $this->apiResponse(1,'success',$governorates);
        return responseJson(1,'success',$notification);
    
    }

    public function getNotificationSettings(Request $request)
    {
        $governoratesIds = $request->user()->governorates()->pluck('governorates.id')->toArray();
        $blood_types_Ids = $request->user()->bloodTypes()->pluck('blood_types.id')->toArray();

        return responseJson(1,'success',[

            'governoratesIds'=>$governoratesIds,
            'blood_type_Ids'=>$blood_types_Ids,



        ]);
    }
     
    public function updateNotificationSettings(Request $request)
    {
        $governoratesIds = $request->user()->governorates()->sync($request->governorates);
        $blood_types_Ids = $request->user()->bloodTypes()->sync($request->bloodTypes);

        return responseJson(1,'success',[

            'governoratesIds'=>$governoratesIds,
            'blood_type_Ids'=>$blood_types_Ids,



        ]);
    }

 

    public function myFavourits(Request $request)
    {
        $posts = $request->user()->posts()->pluck('posts.id')->toArray();

        return responseJson(1,'success',[

            'posts'=>$posts,
            



        ]);
    }


    public function toggleFavourits(Request $request)
    {
        $posts = $request->user()->posts()->toggle($request->posts);

        return responseJson(1,'success',[

            'posts'=>$posts,
            



        ]);
    }



    public function unreadNotificationCount(Request $request)
    {
        $unread_notification = $request->user()->posts()->pluck('posts.id')->where('posts.is_read','=',0)->count();

        return responseJson(1,'success',[

            'unread_notification'=>$unread_notification,
            



        ]);
    }
}
