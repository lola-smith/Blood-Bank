<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Token;
use App\Models\DonationOrder;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassowrd;
use Auth;
class MainController extends Controller
{
    public function home(Request $request){
        $client=Client::first();
        auth('client')->login($client);
        
        $posts=Post::take(9)->get();
        $donations = DonationOrder::where(function($query) use($request){
                      
            //مش عارفه اجيبها غير بال id
            if($request->blood_type_id){
                $query->where('blood_type_id',$request->blood_type_id);
                }
                if ($request->has('city_id')) {
                    $query->where('city_id','LIKE','%'.$request->city_id.'%');                        
                }
            })->take(3)->get();
       return view('front.home')->with([
        'posts'=>$posts,
        'donations'=>$donations,
       ]); 
       
     
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

             public function articals(){
                // $posts=Post::with('category')->paginate(10);
                $posts=Post::all();
                return view('front.articals',compact('posts')); 
                 }

                 public function favouriteArticals(Request $request){
                    // $posts=Post::with('category')->paginate(10);
                    
                    $posts = $request->user()->posts()->get();
                    // dd($posts);
                    // $posts=Post::all();
                    return view('front.listfavourites')
                    ->with([
                        'posts'=>$posts
                        
                       ]); 
                     }


                 public function donations(Request $request){
                    // $posts=Post::with('category')->paginate(10);

                    $donations = DonationOrder::where(function($query) use($request){
                      
                        //مش عارفه اجيبها غير بال id
                        if($request->blood_type_id){
                            $query->where('blood_type_id',$request->blood_type_id);
                            }
                            if ($request->has('city_id')) {
                                $query->where('city_id','LIKE','%'.$request->city_id.'%');                        
                            }
                        })->paginate(20);
                    // $donations=DonationOrder::all();
                    return view('front.donations',compact('donations')); 
                     }
 
                     public function donation(Request $request){
                        
                        $donation= DonationOrder::where('id',$request->id)->first();
                        // dd($request);
                        return view('front.donation',compact('donation')); 
                         }


                         public function getProfile(Request $request){
                            
                           
                            $model=$request->user();
                            
                            // dd($request);
                            return view('front.profile',compact('model')); 
                             }

                             public function updateProfile(Request $request){
                        
                                $profile_data=$request->user();
                
                                if ($request->has('password')) {
                
                                 $request->merge(['password'=>bcrypt($request->password)]);
                
                                   }
                
                                   $profile_data->update($request->all());

                                   flash()->success("edite succseefully");
                                // dd($request);

                                return view('front.profile'); 
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











                 public function getCreatDonation(){
                    // $governorates=Governorate::all();
                    // return view('front.register',compact('governorates'));
                    return view('front.createdonation');  
                     }
        
        
                     public function creatDonationSave(Request $request){
        
                        $rules=[
                            'patient_name'=>'required',
                            'patient_age'=>'required',
                            'bags_number'=>'required',
                            'blood_type_id'=>'required',
                            'hospital_name'=>'required',
                            'city_id'=>'required',
                            'hospital_address'=>'required',
                            'patient_phone'=>'required',
                            // 'client_id'=>'required',
                            'notes'=>'required',
                            'longitude'=>'required',
                            'latitude'=>'required',
                            ];
                     
                            $messages=[
                             'patient_name.required'=>'patient name is required',
                             'patient_age.required'=>'patient age is required',
                             'bags_number.required'=>'bags number is required',
                             'blood_type_id.required'=>'blood type is required',
                             'hospital_name.required'=>'hospital name is required',
                             'city_id.required'=>'city is required',
                             'hospital_address.required'=>'hospital address is required',
                             'patient_phone.required'=>'patient phone is required',
                             'notes.required'=>'notes is required',
                             'longitude.required'=>'longitude is required',
                             'latitude.required'=>'latitude is required',
                             
                             
                         ];
                         $this->validate($request,$rules,$messages);





        //$donation_order=DonationOrder::create($request->all( ));

        $donation_order=$request->user()->donationOrders()->create($request->all( ));


        $clientsIds=$donation_order->city->governorate->clients()
        ->whereHas('bloodtypes',function($q) use ($request,$donation_order) {

            $q->where('blood_types.id',$donation_order->blood_type_id);
        })->pluck('clients.id')->toArray();

     
         dd($clientsIds);
         $send="";

       if(count($clientsIds)){

// هوا قال علاقه النوتيفيكاشن بالدوناشن اوردر وان تو ون و بعدين دلوقتي عاملها ميني تو ميني 
          $notification=$donation_order->notification()->create([
          'title'=>' احتاج متبرع لفصيلة',
          //'content'=>$request->user()->name.'محتاج متبرع لفصيلة'
          'content'=>$donation_order->bloodType->name.'محتاج متبرع لفصيلة'

          ]);
          $notification->clients()->attach($clientsIds);
          $tokens=Token::whereIn('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();
       // dd($tokens);

        //   $tokens=$client->tokens()->where('token','!=','')->whereIn('client_id',$clientsIds)->pluck('token')->toArray();
       

          if(count($tokens)){
              
        $title=$notification->title;
        $body=$notification->content;
        $data=[
            
            'donation_order_id'=>$donation_order->id,
        ];

        // info(json_encode($data));

        $send=notifyByFirebase($title,$body,$tokens,$data);
        // info($send);
        //info("firebase result".$send);
         //$send=json_encode($send);
        //   }



       }

        //$donation_order->save();
       
       }
       
                       
                         flash()->success("success");
                     
                         return redirect(route('creat.donation' ,compact('send')));
                        
                         }




     public function toggleFavourite(Request $request){
        $posts = $request->user()->posts()->toggle($request->post_id);
       
         }









        //  public function getResetPassword(){
        //     return view('front.resetpass');  

        // }

        // public function resetPassword(Request $request){


        // $rules=[
           
        //     'phone'=>'required',
        
        //     ];
     
        //     $messages=[
            
        //      'phone.required'=>'phone is required',
            
            
             
             
        //  ];
        //  $this->validate($request,$rules,$messages);


        //     $client =Client::where('phone',$request->phone)->first();
        
        //    if($client){
        //        $code=rand(1111,9999);
        //        $update=$client->update(['pin_code'=>$code]);
        //     if ($update) {
        
        //         Mail::to($client->email)
            
        //     ->bcc("lolasmithw@gmail.com")
        //     ->send(new ResetPassowrd($client));

        //     flash()->success("reset mail sended check your mail");
     
        //    return redirect(route('new.password'));
                
                
                
        //         }
        //     else {
        //         return redirect(route('reset.password'));
         
        //     }
        
        // }
        //    else {
        //     return redirect(route('reset.password'));
        //    }
        
           
        
        // }







        // public function getNewPassword(){
        //     return view('front.newpass');  

        //  }

        //  public function newPassword(Request $request){

        //     $validator=validator()->make($request->all(),[
        
                
        //         'pin_code'=>'required',
        //         'password'=>'required|confirmed',
        //         'phone'=>'required',
        
        //     ]);
        //     if($validator->fails()){
        //        return responseJson(0,$validator->errors()->first(),$validator->errors());
        
        
        //     }
        //     $client =Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->where('phone',$request->phone)->first();
        
        //    if($client){
        //        $client->password=bcrypt($request->password);
        
        //         $client->pin_code=null;
        //     if ($client->save()) {
        
               
        //         flash()->success("reset mail sended check your mail");
 
        //    return redirect(route('clienthome.login'));
        //         }
        //     else {
        //         return redirect(route('new.password'));
         
        //     }
        
        // }
        //    else {
        //     return redirect(route('new.password'));
        //    }
        
           
        
        
        // }


         
}
