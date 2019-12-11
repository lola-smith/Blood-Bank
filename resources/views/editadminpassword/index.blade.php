@extends('layouts.app')


@section('page_title')
password
@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
     
     @include('flash::message')
     <br>
     {!! Form::open(['action'=>'ChangePasswordController@changeAdminPassword','method'=>'post']) !!}


<div class="form-group"><div class="form-group">
 <label for="name">Old password</label>

 {!! Form::password('current-password', ['class' => 'form-control']) !!}
 
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
<button class="btn btn-primary" type="submit">
submit
</button>
   
 
 
</div>
{!! Form::close() !!}
        </div>
        <!-- /.box-body -->
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->




@endsection
