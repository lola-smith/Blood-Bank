@extends('front.master')
@section('content')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Login Start -->
    <section id="login">
        <div class="container">
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                <form action="{{route('clienthome.login.submit')}}" method="post">
                {{csrf_field()}}
                <!-- <input class="username form-control" type="phone" placeholder="Phone" required>
                <input class="password" type="Password" placeholder="Password" required> -->
                
                <div class="form-group {{$errors->has('phone') ? 'has-error':''}} has-feedback">
        <input id="phone" value="{{old('phone')}}" name="phone" type="phone" class=" username form-control" placeholder="Phone">
        @if($errors->has('phone'))
        <span class="help-block">
        <strong>{{$errors->first('phone')}}</strong>
        </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group {{$errors->has('password') ? 'has-error':''}} has-feedback">
        <input id="password" value="{{old('password')}}" name="password" type="password" class="password form-control" placeholder="Password">

        @if($errors->has('password'))
        <span class="help-block">
        <strong>{{$errors->first('password ')}}</strong>
        </span>
        @endif
         
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input class="check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me
                    <a href="#">Forget Password ?</a><br>
                    <div class="reg-group">
                        <button style="background-color: darkred;">Login</button>
                        <button style="background-color: rgb(51, 58, 65);">Make new account</button>
                    </div>
                </form>
        </div>
    </section>
    <!-- Login End -->

  @endsection
 