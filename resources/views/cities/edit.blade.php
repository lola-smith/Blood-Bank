@extends('layouts.app')
@inject('gov','App\Models\Governorate')

@section('page_title')
Edit city

@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit city</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        {!! Form::model($model, [
        'action' => ['CityController@update',$model->id],
        'method' => 'put'
        
        ]) !!}

        @include('flash::message')
        @include('partials.validation_errors ')

        @include('Cities.form')

         {!! Form::close() !!} 


    
        
        </div>
        <!-- /.box-body -->
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->




@endsection
