@if(Auth::guard('web')->check())
<p class="text-success">
you are login as  user
</p>
@else
<p class="text-danger">
you are logout as  user
</p>
@endif

@if(Auth::guard('client')->check())
<p class="text-success">
you are login as  client
</p>
@else
<p class="text-danger">
you are logout as  client
</p>
@endif