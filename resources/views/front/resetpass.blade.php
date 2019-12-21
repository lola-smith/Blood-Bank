@extends('front.master')
@section('content')
@inject('model','App\Models\Client)
    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
        @include('flash::message')
        @include('partials.validation_errors ')
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                {!! Form::model($model, ['action' => 'Front\AuthController@resetPassword']) !!}
            
                    {!! Form::text('phone',null, ['class' => 'form-control','placeholder' => 'phone']) !!}

                    <div class="reg-group">
                        <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                    </div>
                    {!! Form::close() !!} 
        </div>
    </section>
  
   
   
    <!-- Sign Up End -->
     
    @endsection

