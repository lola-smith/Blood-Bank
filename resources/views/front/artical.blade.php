@extends('front.master')
@section('content')
<!-- article Start -->
<section id="article">
        <div class="container">
        <img src="{{asset($record->image)}}" class="img-responsive head-img">
            <!-- <img class="head-img" src="{{$record->title}}" alt=""> -->
            <div class="details-container">
                <div class="title">
                    
                <button onclick= "toggleFavourite(this)" id="{{$record->id}}" class=" float-left
                                {{$record->is_favourite ? 'second-heart':'first-heart'}}
                                "><i class="fas fa-heart icon-large"></i></button>
                {{$record->title}}</div>
                <p>
                {{$record->body}}
                </p>
                <strong><a>Share this article:</a></strong>

                <div class="icons">
                                <a href="{{$settings->fb_link}}"><i
                            class="fab fa-facebook-square fa-2x"></i></a>
                            
                            <a href="{{$settings->tw_link}}"><i
                            class="fab fa-twitter-square fa-2x"></i></a>

                            <a href="{{$settings->tw_link}}"><i
                            class="fab fa-google-plus-square fa-2x"></i></a>

                                </div>
                <!-- <div class="icons">
                    <i class="fab fa-facebook-square fa-3x"></i>
                    <i class="fab fa-google-plus-square fa-3x"></i>
                    <i class="fab fa-twitter-square fa-3x"></i>
                </div> -->

            </div>

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
    @push('scripts')
    <script>
    
    function toggleFavourite(heart){
        var post_id=heart.id;
        $.ajax({
          url:'{{url(route('toggle-favourite'))}}',
          type:'post',
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
