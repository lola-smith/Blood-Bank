<div class="form-group">
 <label for="name">category</label>
 {!! Form::select('category_id',$cat::pluck('name','id'),null, ['class' => 'form-control']) !!}

 
</div>

<div class="form-group">
 <label for="name">title</label>

 {!! Form::text('title',null, ['class' => 'form-control']) !!}
 
</div>
<div class="form-group">
 <label for="name">body</label>

 {!! Form::text('body',null, ['class' => 'form-control']) !!}
 
</div>

<div class="form-group">
 <label for="name">image</label>

 
 {{form::file('image',['placeholder'=>'select featured image','class'=>'form-control ckeditor'])}}

</div>




<div class="form-group">
<button class="btn btn-primary" type="submit">
submit
</button>
   
 
 
</div>