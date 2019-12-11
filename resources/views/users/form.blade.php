
@inject('role','App\Models\Role')
<?php
$roles=$role::pluck('display_name','id')->toArray();
?>
<div class="form-group">
 <label for="name">Name</label>

 {!! Form::text('name',null, ['class' => 'form-control']) !!}
 
</div>

<div class="form-group">
 <label for="email">email</label>

 {!! Form::text('email',null, ['class' => 'form-control']) !!}
 
</div>


<div class="form-group">
 <label for="name">password</label>

 {!! Form::password('password', ['class' => 'form-control']) !!}
 
</div>
<div class="form-group">
 <label for="name">confirme</label>

 {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
 
</div>

<div class="form-group">
 <label for="roles_list">role</label>
 {!! Form::select('roles_list[]',$role::pluck('display_name','id'),null, ['class' => 'form-control','multiple' => 'multiple']) !!}

 
</div>









<div class="form-group">
<button class="btn btn-primary" type="submit">
submit
</button>
   
 
 
</div>