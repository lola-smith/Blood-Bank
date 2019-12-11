@extends('layouts.app')
@inject('model','App\User')

@section('page_title')
Create user

@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create user</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        {!! Form::model($model, ['action' => 'UserController@store']) !!}


        @include('partials.validation_errors ')

        @include('users.form')

         {!! Form::close() !!} 


    
        
        </div>
        <!-- /.box-body -->
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->




@endsection
