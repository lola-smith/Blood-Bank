@extends('front.master')
@section('content')
@inject('model','App\Models\Contact')
    <!-- login Start -->
    <section id="contact">
        <div class="container">
        @include('flash::message')
        @include('partials.validation_errors ')
            <div class="row">
                <div class="col-md-6 call">
                    <div class="title">Head</div>
                    <img src="{{asset('front/imgs/logo.png')}}" alt="">
                    <hr>
                    <h4>Mobile: {{$settings->phone}}</h3>
                        <h4>Fax: {{$settings->fax}}</h3>
                            <h4>Email: {{$settings->email}}</h3>
                                <hr>
                                <h3>Find Us On</h3>
                                <div class="icons">
                                <a href="{{$settings->fb_link}}"><i
                            class="fab fa-facebook-square fa-3x"></i></a>

                            <a href="{{$settings->insta_link}}"><i
                            class="fab fa-instagram fa-3x"></i></a>

                            <a href="{{$settings->tw_link}}"><i
                            class="fab fa-twitter-square fa-3x"></i></a>

                            <a href="{{$settings->whatsup_num}}"><i
                            class="fab fa-whatsapp-square fa-3x"></i></a>

                            
                            <a href="{{$settings->youtube_link}}"><i
                            class="fab fa-youtube-square fa-3x"></i></a>
                                    <!-- <i class="fab fa-facebook-square fa-3x"></i> -->
                                    <!-- <i class="fab fa-google-plus-square fa-3x"></i> -->
                                    <!-- <i class="fab fa-twitter-square fa-3x"></i> -->
                                    <!-- <i class="fab fa-whatsapp-square fa-3x"></i> -->
                                    <!-- <i class="fab fa-youtube-square fa-3x"></i> -->
                                </div>
                </div>
                <div class="col-md-6 info">
                    <div class="title">Head</div>
                    {!! Form::model($model, ['action' => 'Front\MainController@contactUsSave']) !!}
                                             
                    <div class="form-group">
                

                   {!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'name']) !!}
 
 
                     </div>
                     <div class="form-group">
                  

                   {!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'email']) !!}
 
 
                     </div>
                     <div class="form-group">
                  

                   {!! Form::text('phone',null, ['class' => 'form-control','placeholder' => 'phone']) !!}
 
 
                     </div>
                     <div class="form-group">
                  

                   {!! Form::text('subject',null, ['class' => 'form-control','placeholder' => 'subject']) !!}
 
 
                     </div>
                     <div class="form-group">
                  

                   {!! Form::textarea('message',null, ['class' => 'form-control','placeholder' => 'Message','cols' => '10','rows' => '5']) !!}
 
 
                     </div>
                     <div class="reg-group">
                            <button type="submit">Send</button>
                        </div>      
                  
                     {!! Form::close() !!} 
                    <!-- <form action="submit"> -->
                        <!-- <input type="text" name="name" id="" placeholder="Name" required=""> -->
                        <!-- <input type="email" name="name" id="" placeholder="Email" required="">
                        <input type="number" name="name" id="" placeholder="Phone" required="">
                        <input type="text" name="title" id="" placeholder="Title" required="">
                        <textarea name="message" id="" cols="10" rows="5" placeholder="Message"></textarea> -->
                        <!-- <div class="reg-group">
                            <button type="submit">Send</button>
                        </div> -->
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </section>
    <!-- login End -->
    @endsection
@section('login')
<button class="btn signup" onclick= "window.location.href = 'signup.html';">my profile</button>
<button class="btn login" onclick= "window.location.href = '{{ route('clienthome.logout') }}'">Logout</button>
 <!-- <button class="btn login" onclick= "window.location.href = '{{ route('clienthome.login') }}'">Login</button> -->
 @endsection
