@extends('front.master')
@section('content')
@inject('model','App\Models\DonationOrder')
    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
        @include('partials.validation_errors ')
        @include('flash::message')
           
            
     
     {!! Form::model($model, ['action' => 'Front\MainController@donations',
      'method' => 'get'
     ]) !!}
     <div class="row">
     <div class="col-lg-5">
                @inject('blood','App\Models\BloodType')
                    {!! Form::select('blood_type_id',$blood::pluck('name','id')->toArray(),null, [
                        
                        'id' => 'blood_types',
                        'placeholder' => 'chose blood type'
                        
                        
                        ]) !!}

                    <!-- <select name="Type" id="">
                        <option value="" disabled selected>Select Blood Type</option>
                        <option value="AB+">AB+</option>
                        <option value="O">O</option>
                        <option value="B">B</option>
                    </select> -->
                </div>
                <div class="col-lg-5">
                @inject('city','App\Models\City')
                    {!! Form::select('city_id',$city::pluck('name','id')->toArray(),null, [
                        
                        'id' => 'cities',
                        'placeholder' => 'chose city',
                        
                        
                        ]) !!}
                    <!-- <select name="City" id="">
                        <option value="" disabled selected>Select City</option>
                        <option value="Alexandria">Alexandria</option>
                        <option value="Cairo">Cairo</option>
                        <option value="Giza">Giza</option>
                    </select> -->
                </div>
                <div class="search col-lg-2 ">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
        

                </div>
          
         {!! Form::close() !!} 
               
            
            @foreach($donations as $donation)
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>{{$donation->bloodType->name}}</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: {{$donation->patient_name}}</h4>
                            <h4>Hospital: {{$donation->hospital_name}}</h4>
                            <h4>City: {{$donation->city->name}}</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = '{{url('donation-details',$donation->id)}}'">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </section>
@endsection
@section('login')
<button class="btn signup" onclick= "window.location.href = 'signup.html';">my profile</button>
<button class="btn login" onclick= "window.location.href = '{{ route('clienthome.logout') }}'">Logout</button>
 <!-- <button class="btn login" onclick= "window.location.href = '{{ route('clienthome.login') }}'">Login</button> -->
 @endsection
