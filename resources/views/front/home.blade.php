@extends('front.master')
@section('content')
    <!-- Header Start -->
    <section id="header">
        <div class="container">
            <!-- <h1>We are seeking for a better community health.</h1>
            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat inventore nemo repudiandae
                ipsum quos.</h4>
            <button class="btn more" onclick= "window.location.href = 'About-us.html';">More</button> -->
        </div>
    </section>
    <!-- Header End -->

    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
        <h3>{{$settings->intro}}</h3>

            <!-- <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3> -->
        </div>
    </section>
    <!-- Sub Header End -->

    <!-- Articles Start -->
    <section id="articles">
        <div class="container">
            <h2 style="display: inline-block;">Articles</h2>
            <div class="swiper-container">
            <div class="button-area" style="display: inline-block; margin-left: 850px;">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </button>
            </div>

                <div class="swiper-wrapper">

                   @foreach($posts as $post)
                   <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img-top" style="position: relative;">
                                <img src="{{asset($post->image)}}" alt="Card image">
                                <!-- <i onclick= "toggleFavourite(this)" id="{{$post->id}}"  class="fas fa-heart icon-large first-heart"></i> -->
                                <button onclick= "toggleFavourite(this)" id="{{$post->id}}" class=" 
                                {{$post->is_favourite ? 'second-heart':'first-heart'}}
                                "><i class="fas fa-heart icon-large"></i></button>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$post->title}}</h4>
                                <p class="card-text">{{$post->body}} </p>
                                <div class="btn-cont">
                                    <button class="card-btn" onclick= "window.location.href = '{{url('artical',$post->id)}}'">Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   @endforeach
            </div>
        </div>
    </section>
    <!-- Articles End -->

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <select name="Type" id="">
                        <option value="" disabled selected>Select Blood Type</option>
                        <option value="AB+">AB+</option>
                        <option value="O">O</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div class="col-lg-5">
                    <select name="City" id="">
                        <option value="" disabled selected>Select City</option>
                        <option value="Alexandria">Alexandria</option>
                        <option value="Cairo">Cairo</option>
                        <option value="Giza">Giza</option>
                    </select>
                </div>
                <div class="search">
                    <button><i class="col-lg-2 fas fa-search"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>AB+</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Cairo</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donator.html';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>AB+</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Cairo</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donator.html';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>AB+</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Cairo</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donator.html';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more-req">
                <button onclick= "window.location.href = 'requests.html';">More</button>
            </div>
        </div>
    </section>
    <!-- Requests End -->

    <!-- Call us Start -->
    <section id="call-us">
        <div class="layer"> 
            <div class="container">
                <h1>Call Us</h1>
                <h4>{{$settings->call_us_text}}</h4>
                <div class="whats">
                    <img src="{{asset('front/imgs/whats.png')}}" alt="">
                    <h3>{{$settings->phone}}</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Call us End -->

    <!-- App Start -->
    <section id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <h1>Blood Bank Application</h1>
                        <h3>{{$settings->blood_app_text}}</h3>
                        <h4>Available On</h4>
                        <img src="{{asset('front/imgs/ios.png')}}" alt="">
                        <img src="{{asset('front/imgs/google.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="app-screen" src="{{asset('front/imgs/App.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- App End -->
    @push('scripts')
    <script>
    
    function toggleFavourite(heart){
        var post_id=heart.id;
        $.ajax({
          url:'{{url(route('toggle-favourite'))}}',
          method:'post',
          data:{_token:"{{csrf_token()}}",post_id:post_id},
          success:function(data){
          if(data.status==1){
            console.log(data);
              var currentClass=$(heart).attr('class');
            //   alert(currentClass);
        if(currentClass == 'first-heart'){
            // console.log(true);
            $(heart).removeClass('first-heart').addClass('second-heart');
        }
        else{
            // console.log(false);
            $(heart).removeClass('second-heart').addClass('first-heart');
        }
          }
          },
          error: function (jqXhr, textStatus, errorMessage) { // error callback 
             alert(errorMessage);
    }

        });
       
    }
    
    </script>
    @endpush
    
@endsection
@section('login')
<button class="btn signup" onclick= "window.location.href = 'signup.html';">New Account</button>
<button class="btn login" onclick= "window.location.href = '{{ route('clienthome.logout') }}'">Logout</button>
 <!-- <button class="btn login" onclick= "window.location.href = '{{ route('clienthome.login') }}'">Login</button> -->
 @endsection
