<?php
  use App\User;
  use App\Student;
?>

@extends('dashboard.layout')

@section('content')
  <h1>List of Colleges</h1>
  <style>
    .btn-xs{
      margin-bottom:10px !important;
    }
  </style>
  <a href="{{action('CollegesController@create')}}" class="btn btn-info">Create</a>
  @if(count($colleges) > 0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="30%">Name</th>
          <th>Nickname</th>
          <th>Students Enrolled</th>
          <th>Username</th>
          <th width="35%">Controls</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($colleges as $college)
    <?php
      $user_id = User::where("username", $college->registration_number)->first()->id;
      $students_enrolled = Student::where("accomp_id", $user_id)->count();
      if($students_enrolled == 0){
        $students_enrolled = "-";
      }
    ?>
        <tr>
          <td>{{$college->name}}</td>
          <td>{{$college->nickname}}</td>
          <td>{{$students_enrolled}}</td>
          <td>{{$college->registration_number}}</td>
          <td>
            <a href="/colleges/{{$college->id}}/edit" class="btn btn-info btn-xs pull-left">Edit</a>
            @if(Auth::id() == 1)
            <a href="/colleges/login_as/{{$college->registration_number}}" class="btn btn-primary btn-xs pull-left" target="_blank">Login</a>
            @endif
            @if($students_enrolled != 0)
            <a href="/students/college/{{$college->registration_number}}" class="btn btn-success btn-xs pull-left">Students</a>
            <a href="/students/college_id_cards/{{$college->registration_number}}" class="btn btn-warning btn-xs pull-left" target="_blank">ID Cards</a>
            <a href="/students/lock_college_id_cards/{{$college->registration_number}}" class="btn btn-warning btn-xs pull-left">Lock ID Cards</a>
            @endif
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