@extends('layouts.app')
@inject('model','App\Models\Client')

@section('page_title')
clients

@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">list of clients</h3>

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

     {!! Form::model($model, ['action' => 'ClientController@index',
      'method' => 'get'
     ]) !!}


        @include('partials.validation_errors ')

        @include('clients.form')
          
         {!! Form::close() !!} 
    @if(count($records))
      <div class="table-responsive">
      <table class="table table-bordered">
      <thead>
      <tr>
      <th>#</th>
      <th>Name</th>
      <th>email</th>
      <th>phone</th>
     
      <th>activate/deactivate</th>
      <th>Delete</th>
      </tr>
      </thead>

      <tbody>
      @foreach($records as $record)

      <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$record->name}}</td>
      <td>{{$record->email}}</td>
      <td>{{$record->phone}}</td>
      <td class="text-center"> 
      {!! Form::model($model, [
        'action' => ['ClientController@update',$record->id],
        'method' => 'put'
        
        ]) !!}

        @if($record->is_activate==0) 
                                
            <button type="submit" class="btn btn-success" name="changeStatus" value="0">Active</button>
                        
    @else
                                   
            <button type="submit" class="btn btn-default" name="changeStatus" value="1">Deactive</button>
                                                        
    @endif



        <!-- <button type="submit" class="btn btn-danger btn-xs"> act</button> -->

        @include('flash::message')
        @include('partials.validation_errors ')

        

         {!! Form::close() !!} 
      
      <!-- <a href="{{url(route('client.edit',$record->id))}}" class="btn btn-success btn-xs"> <i class="fa fa-edit"></i></a> -->
      
      </td>
      <td class="text-center">
      {!! Form::open([
        'action' => ['ClientController@destroy',$record->id],
        'method' => 'delete'
      ])!!}

      <button type="submit" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></button>
      
      {!!Form::close()!!}
      </td>
      </tr>

      @endforeach
      </tbody>

      </table>
      
      </div>



     @else
          
        <div class="alert alert-success" role="alert">
        no data
        </div>
     @endif
        </div>
        <!-- /.box-body -->
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->




@endsection
