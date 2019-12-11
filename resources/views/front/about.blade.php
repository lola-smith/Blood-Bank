@extends('front.master')
@section('content')
    <!-- Who Start -->
    <section id="who">
        <div class="container">
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                <p>
                {{$settings->about_app}}
                </p>
        </div>
    </section>
    <!-- Who End -->
@endsection
@section('login')
<button class="btn signup" onclick= "window.location.href = 'signup.html';">New Account</button>
 <button class="btn login" onclick= "window.location.href = '{{ route('clienthome.login') }}'">Login</button>
 @endsection