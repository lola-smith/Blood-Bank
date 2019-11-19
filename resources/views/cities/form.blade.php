
<div class="form-group">
 <label for="name">governorate</label>
 {!! Form::select('governorate_id',$gov::pluck('name','id'),null, ['class' => 'form-control']) !!}

 
</div>

<div class="form-group">
 <label for="name">city</label>

 {!! Form::text('name',null, ['class' => 'form-control']) !!}
 
 
</div>


<div class="form-group">
<button class="btn btn-primary" type="submit">
submit
</button>
   
 
 
</div>