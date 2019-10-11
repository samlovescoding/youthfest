@extends('dashboard.layout')

@section('content')
  <?php
  ?>
  <h1>User Requests</h1>
  @if(count($users_data) > 0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="10%">Name</th>
          <th width="30%">Email</th>
          <th width="15%">College</th>
          <th width="20%">Controls</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($users_data as $user_data)
        <tr>
          <td>{{$user_data->name}}</td>
          <td>{{$user_data->email}}</td>
          <td>{{$user_data->college_id}}</td>
          <td>
            @if($user_data->is_admin == 0)
              <a href="{{action("HomeController@approve_user", $user_data->id)}}" class="btn btn-warning btn-xs pull-left">Approve</a>
            @endif
            {!!Form::open(["action"=>["HomeController@destroy_user", $user_data->id], "method"=>"POST"])!!}
              {!!Form::submit("Delete", ["class"=>"btn btn-danger btn-xs"])!!}
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
      </tbody>
    </table>
  @else
    <h3>You have added no pending user requests.</h3>
  @endif
  <style>
    .btn.pull-left{
      margin-right:5px;
    }
  </style>
@endsection