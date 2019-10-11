@extends('dashboard.layout')

@section('content')
  <h1>List of Events</h1>
  <a href="{{action('EventsController@create')}}" class="btn btn-info">Create</a>
  @if(count($events) > 0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Time Length</th>
          <th>Max Participants</th>
          <th>Max Accomplices</th>
          <th>Organised By</th>
          <th width="20%">Controls</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($events as $event)
        <tr>
          <td>{{$event->name}}</td>
          <td>{{$event->time_length}}</td>
          <td>{{$event->max_participants}}</td>
          <td>{{$event->max_accomp}}</td>
          <td>{{$event->organised_by}}</td>
          <td>
            <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-xs pull-left">Edit</a>
            {!!Form::open(["action"=>["EventsController@destroy", $event->id], "method"=>"POST"])!!}
              {!!Form::hidden("_method", "DELETE")!!}
              {!!Form::submit("Delete", ["class"=>"btn btn-danger btn-xs"])!!}
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
      </tbody>
    </table>
  @else
    <h3>You have added no events added for the festival.</h3>
  @endif
  <style>
    .btn.pull-left{
      margin-right:5px;
    }
  </style>
@endsection