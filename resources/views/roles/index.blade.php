@extends('layouts.app')


@section('page_title')
Role

@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">list of role</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
      <a href="{{url(route('role.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> New role</a>
     <br>
     <br>
     @include('flash::message')
     <br>
    @if(count($records))
      <div class="table-responsive">
      <table class="table table-bordered">
      <thead>
      <tr>
      <th>#</th>
      <th>Name</th>
      <th>desplay name</th>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
      </thead>

      <tbody>
      @foreach($records as $record)

      <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$record->name}}</td>
      <td>{{$record->display_name}}</td>
      <td class="text-center"> <a href="{{url(route('role.edit',$record->id))}}" class="btn btn-success btn-xs"> <i class="fa fa-edit"></i></a></td>
      <td class="text-center">
      {!! Form::open([
        'action' => ['RoleController@destroy',$record->id],
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
