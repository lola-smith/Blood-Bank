@extends('layouts.app')

@inject('model','App\Models\DonationOrder')
@section('page_title')
Donation Orders
@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">list of Donations</h3>

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
     {!! Form::model($model, ['action' => 'DonationController@index',
      'method' => 'get'
     ]) !!}


        @include('partials.validation_errors ')

        @include('donations.formfilter')
          
         {!! Form::close() !!} 
    @if(count($records))
      <div class="table-responsive">
      <table class="table table-bordered">
      <thead>
      <tr>
      <th>#</th>
      <th>patient name</th>
      <th>patient age</th>
      <th>patient phone</th>
      <th>bags_number</th>
      <th>blood type</th>
      <th>city</th>
      <th>hospital name</th>
      <th>hospital address</th>
      <th> longitude</th>
      <th> latitude</th>
      <th>notes</th>
      <th>show</th>
      <th>Delete</th>
      
      </tr>
      </thead>

      <tbody>
      @foreach($records as $record)

      <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$record->patient_name}}</td>
      <td>{{$record->patient_age}}</td>
      <td>{{$record->patient_phone}}</td>
      <td>{{$record->bags_number}}</td>
      <td >{{$record->bloodType->name}} </td>
      <td >{{$record->city->name}} </td>
      <td>{{$record->hospital_name}}</td>
      <td>{{$record->hospital_address}}</td>
      <td>{{$record->longitude}}</td>
      <td>{{$record->latitude}}</td>
      <td >{{$record->notes}} </td>
      <td class="text-center"> <a href="{{url(route('donation.show',$record->id))}}" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a></td>


     
      
      
     
      <td class="text-center">
      {!! Form::open([
        'action' => ['DonationController@destroy',$record->id],
        'method' => 'delete',
        
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
