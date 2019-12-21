@extends('front.master')
@section('content')
    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
        @include('flash::message')
        @include('partials.validation_errors ')
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                {!! Form::model($model, ['action' => 'Front\MainController@updateProfile']) !!}
               <!-- <div class="form-group"> -->
               

                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'name']) !!}
 
                <!-- </div> -->
                <!-- <div class="form-group"> -->

                {!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'email']) !!}

                {!! Form::password('password',null, ['class' => 'form-control','placeholder' => 'password']) !!}
                {!! Form::password('password_confirmation',null, ['class' => 'form-control','placeholder' => 'password_confirmation']) !!}
                 <!-- </div> -->

                <!-- <div class="form-group"> -->
                
                {!! Form::text('dob',null, ['class' => 'form-control','placeholder' => 'Birth date']) !!}
               
 
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
                    <!-- <select name="Gov" id="Gov" required="">
                        <option value="Governorate" disabled>Governorate</option>
                        <option value="A">Alexandria</option>
                        <option value="B">Cairo</option>
                        <option value="O">Giza</option>
                        <option value="AB+">Fayoum</option>
                    </select> -->
                    <!-- <input type="Phone" placeholder="Phone Number" required="">
                    <input type="date" name="donate-day"> -->
                    <!-- <div class="form-group"> -->
                    {!! Form::text('phone',null, ['class' => 'form-control','placeholder' => 'phone']) !!}

                 <!-- </div> -->

                <!-- <div class="form-group"> -->
                
                {!! Form::text('last_donation_date',null, ['class' => 'form-control','placeholder' => 'donate date']) !!}
                
 
                   <!-- </div> -->
                    <div class="reg-group">
                        <input class="check" type="checkbox" required="" style="height: auto; display:inline; margin: 0 auto;">Agree on terms and conditions<br>
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

