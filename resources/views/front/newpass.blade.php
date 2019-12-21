@extends('front.master')
@section('content')
@inject('model','App\Models\Client)
    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
        @include('flash::message')
        @include('partials.validation_errors ')
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                {!! Form::model($model, ['action' => 'Front\AuthController@newPassword']) !!}
                 {!! Form::text('pin_code',null, ['class' => 'form-control','placeholder' => ' pin code']) !!}
                
               
                {!! Form::password('password',null, ['class' => 'form-control','placeholder' => 'password']) !!}
                {!! Form::password('password_confirmation',null, ['class' => 'form-control','placeholder' => 'password_confirmation']) !!}
                
                    {!! Form::text('phone',null, ['class' => 'form-control','placeholder' => 'phone']) !!}

              
               
 
                   <!-- </div> -->
                    <div class="reg-group">
                        <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                    </div>
                    {!! Form::close() !!} 
        </div>
    </section>
    @push('scripts')
    <script>
        $("#governorates").change(function (e) {
            
            e.preventDefault();
         var governorate_id=$("#governorates").val();
         if(governorate_id){

            $.ajax({
          url:'{{url('api/v1/cities?governorate_id= ')}}'+governorate_id,
          type:'get',
         
          success:function(data){
          if(data.status==1){
            $("#cities").empty();
            $("#cities").append('<option value="">choose city</option>');
              //دي فور ايتش بالجيكويري
            $.each(data.data, function (index, city) {
                
                $("#cities").append('<option value="'+city.id+'"> '+city.name+'</option>');
             });
          
          }
          },
          error: function (jqXhr, textStatus, errorMessage) { // error callback 
             alert(errorMessage);
    }

        });

         }else{
            $("#cities").empty();
            $("#cities").append('<option value="">choose city</option>');
             
         }
            
        });
   
    </script>
    <!-- Sign Up End -->
     @endpush
    @endsection

