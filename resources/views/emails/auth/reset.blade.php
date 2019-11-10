@component('mail::message')
# Introduction

blood bank reset passowrd.
<br>
<p>hellow {{$client->name}}</p>

<!-- @component('mail::button', ['url' => 'http://ipda3.com'])
reset
@endcomponent -->
<p>your reset password is :{{$client->pin_code}}</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
