@extends('layouts.app')


@section('page_title')
Setting

@endsection

@section('small_title')
 
@endsection

@section('content')

 

    
    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">list of settings</h3>

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
    @if(count($records))
      <!-- <div class="table-responsive">
      <table class="table table-bordered">
      <thead>
      <tr>
      
      <th>Phone</th>
      <th>Email</th>
      <th>fb_link</th>
      <th>tw_link</th>
      <th>insta_link</th>
      <th>youtube_link</th>
      <th>whatsup_num</th>
      <th>about_app</th>
      <th>play_store_url</th>
      <th>app_store_url</th>
      <th>notification_settings_text</th>
      
      
      </tr>
      </thead>

      <tbody>
      @foreach($records as $record)

      <tr>
      
      <td>{{$record->phone}}</td>
      <td >{{$record->email}} </td>
      <td >{{$record->fb_link}} </td>
      <td >{{$record->tw_link}} </td>
      <td > {{$record->insta_link}}</td>
      <td >{{$record->youtube_link}} </td>
      <td > {{$record->whatsup_num}}</td>
      <td >{{$record->about_app}} </td>
      <td >{{$record->play_store_url}} </td>
      <td >{{$record->app_store_url}} </td>
      <td > {{$record->notification_settings_text}}</td>
    
      </tr>

      @endforeach
      </tbody>

      </table>
           
      </div>
     <div class="text-center">
      <a href="{{url(route('setting.edit',$record->id))}}" class="btn btn-success btn-xs">Edit <i class="fa fa-edit"></i> </a>
      </div> -->
      


      @foreach($records as $record)

      <div class="form-group text-center">
 <h3><label for="name">Phone</label></h3>
 
 <label for="name">{{$record->phone}}</label>
 <!-- {!! Form::text('phone',null, ['class' => 'form-control']) !!} -->
 
</div>
<div class="form-group text-center">
 <h3><label for="name">Email</label></h3>
 
 <label for="name">{{$record->email}}</label>

 <!-- {!! Form::text('email',null, ['class' => 'form-control']) !!} -->
 
</div>

<div class="form-group text-center">
 <h3><label for="name">fb_link</label></h3>
 
 <label for="name">{{$record->fb_link}}</label>

 <!-- {!! Form::text('fb_link',null, ['class' => 'form-control']) !!} -->
 
</div>

<div class="form-group text-center">
 <h3><label for="name">tw_link</label></h3>
 
 <label for="name">{{$record->tw_link}}</label>

 <!-- {!! Form::text('tw_link',null, ['class' => 'form-control']) !!} -->
 
</div>
<div class="form-group text-center">
<h3><label for="name">insta_link</label></h3> 
 
 <label for="name">{{$record->insta_link}}</label>

 <!-- {!! Form::text('insta_link',null, ['class' => 'form-control']) !!} -->
 
</div>

<div class="form-group text-center">
 <h3><label for="name">youtube_link</label></h3>
 
 <label for="name">{{$record->youtube_link}}</label>


 <!-- {!! Form::text('youtube_link',null, ['class' => 'form-control']) !!} -->
 
</div>

<div class="form-group text-center">
 <h3><label for="name">whatsup_num</label></h3>
 
 <label for="name">{{$record->whatsup_num}}</label>

 <!-- {!! Form::text('whatsup_num',null, ['class' => 'form-control']) !!} -->
 
</div>


 <div class="form-group text-center">
<h3> <label for="name">intro</label></h3>
 
 <label for="name">{{$record->intro}}</label>


 <!-- {!! Form::text('about_app',null, ['class' => 'form-control']) !!} -->
 
</div>
<div class="form-group text-center">
<h3><label for="name">play_store_url</label></h3> 
 
 <label for="name">{{$record->play_store_url}}</label>

 <!-- {!! Form::text('play_store_url',null, ['class' => 'form-control']) !!} -->
 
</div>
<div class="form-group text-center">
<h3><label for="name">app_store_url</label></h3>
 
 <label for="name">{{$record->app_store_url}}</label>

 <!-- {!! Form::text('app_store_url',null, ['class' => 'form-control']) !!} -->
 
</div>

<div class="form-group text-center">
<h3> <label for="name">about_app</label></h3>
 
 <label for="name">{{$record->about_app}}</label>

 <div class="form-group text-center">
<h3> <label for="name">who_text</label></h3>
 
 <label for="name">{{$record->who_text}}</label>

<div class="form-group text-center">
 <h3><label for="name">notification_settings_text</label></h3>
 
 <label for="name">{{$record->notification_settings_text}}</label>

 <!-- {!! Form::textarea('notification_settings_text',null, ['class' => 'form-control']) !!} -->
 
</div>




<div class="form-group text-center">


      <a href="{{url(route('setting.edit',$record->id))}}" class="btn btn-success btn-xs">Edit <i class="fa fa-edit"></i> </a> 
 
</div>

@endforeach



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
