@extends('dashboard.layout')

@section('content')
  <h1>List of Colleges</h1>
  <a href="{{action('CollegesController@create')}}" class="btn btn-info">Create</a>
  @if(count($colleges) > 0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Registration Number</th>
          <th width="20%">Controls</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($colleges as $college)
        <tr>
          <td>{{$college->name}}</td>
          <td>{{$college->registration_number}}</td>
          <td>
            <a href="/colleges/{{$college->id}}/edit" class="btn btn-warning btn-xs pull-left">Edit</a>
            {!!Form::open(["action"=>["CollegesController@destroy", $college->id], "method"=>"POST"])!!}
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