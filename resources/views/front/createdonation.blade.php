@extends('front.master')
@section('content')
@inject('model','App\Models\DonationOrder)
    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
        @include('flash::message')
        @include('partials.validation_errors ')
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                {!! Form::model($model, ['action' => 'Front\MainController@creatDonationSave']) !!}
               

                {!! Form::text('patient_name',null,['class' => 'form-control','placeholder' => 'name']) !!}
 
               

                {!! Form::text('patient_age',null, ['class' => 'form-control','placeholder' => 'age']) !!}

               
                {!! Form::text('bags_number',null,['class' => 'form-control','placeholder' => 'bags number']) !!}
 
               

                {!! Form::text('hospital_name',null, ['class' => 'form-control','placeholder' => 'hospital name']) !!}
  


                {!! Form::text('hospital_address',null,['class' => 'form-control','placeholder' => 'gov-city-st-bil']) !!}
 
               

                {!! Form::text('patient_phone',null, ['class' => 'form-control','placeholder' => 'phone']) !!}

            
                {!! Form::text('notes',null, ['class' => 'form-control','placeholder' => 'notes']) !!}
                {!! Form::text('longitude',null, ['class' => 'form-control','placeholder' => 'longitude']) !!}
                {!! Form::text('latitude',null, ['class' => 'form-control','placeholder' => 'latitude']) !!}


                
               
               
 
                   <!-- </div> -->
                    <!-- <input type="name" placeholder="Name" required>
                    <input type="email" placeholder="Email" required>
                    <input type="date" name="bday" placeholder="Birth date"> -->
                    @inject('blood','App\Models\BloodType')
                    {!! Form::select('blood_type_id',$blood::pluck('name','id')->toArray(),null, [
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id' => 'blood_types',
                        'placeholder' => 'chose blood type'
                        
                        
                        ]) !!}
        
                    @inject('gov','App\Models\Governorate')
                    {!! Form::select('governorate_id',$gov::pluck('name','id')->toArray(),null, [
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id' => 'governorates',
                        'placeholder' => 'chose governorate'
                        
                        
                        ]) !!}
                      
                        {!! Form::select('city_id',[],null, [
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id' => 'cities',
                        'placeholder' => 'chose city'
                        
                        
                        ]) !!}
                  
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

