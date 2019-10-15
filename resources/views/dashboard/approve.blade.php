<?php
  use App\Student;
?>
@extends('dashboard.layout')

@section('content')
  <?php
  ?>
  <h1>User Requests</h1>
  @if(count($users_data) > 0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="60%">Name</th>
          <th width="20%">Number of Students Enrolled</th>
          <th width="20%">Username</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($users_data as $user_data)

        <?php
        $students_enrolled = Student::where("accomp_id", $user_data->id)->count();
        if($students_enrolled == 0){
          $students_enrolled = "-";
        }
        ?>
        <tr>
          <td>{{$user_data->name}}</td>
          <td>{{$students_enrolled}}</td>
          <td>{{$user_data->username}}</td>
          {{-- <td>
            @if($user_data->is_admin == 0)
              <a href="{{action("HomeController@approve_user", $user_data->id)}}" class="btn btn-warning btn-xs pull-left">Approve</a>
            @endif
            {!!Form::open(["action"=>["HomeController@destroy_user", $user_data->id], "method"=>"POST"])!!}
              {!!Form::submit("Delete", ["class"=>"btn btn-danger btn-xs"])!!}
            {!!Form::close()!!}
          </td> --}}
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