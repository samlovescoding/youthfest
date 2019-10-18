<?php
  use App\EventRelations;
?>
@extends('dashboard.layout')

@section('content')
  <h1>List of Enrolled Students</h1>
  @if(count($students) > 0)

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="10%">Roll Number</th>
          <th width="30%">Name</th>
          <th width="15%">Class</th>
          <th width="15%">University Registration No.</th>
          <th width="25%">Controls</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($students as $student)
    <?php
      if(isset($unassigned)){
        $event_relations_n = EventRelations::where("student", $student->id)->count();
        if($event_relations_n >= 1){
          continue;
        }
      }
    ?>
        <tr>
          <td>{{$student->roll_number}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->class}} {{$student->branch}}</td>
          <td>{{$student->university_registration}}</td>
          <td>
            <a href="/students/{{$student->id}}" class="btn btn-primary btn-xs pull-left">View</a>
            <a href="http://117.254.49.252/students/{{$student->id}}/print" class="btn btn-info btn-xs pull-left" target="_blank">Print</a>
            @if(Auth::id() == 1)
            <a href="http://117.254.49.252/students/{{$student->id}}/id-card" class="btn btn-info btn-xs pull-left" target="_blank">ID Card</a>
            @endif
            <a href="/students/{{$student->id}}/edit" class="btn btn-warning btn-xs pull-left">Edit</a>
            {!!Form::open(["action"=>["StudentsController@destroy", $student->id], "method"=>"POST"])!!}
              {!!Form::hidden("_method", "DELETE")!!}
              {!!Form::submit("Delete", ["class"=>"btn btn-danger btn-xs"])!!}
            {!!Form::close()!!}
          </td>
        </tr>
    @endforeach
      </tbody>
    </table>
  @if(!isset($unassigned))
    {{$students->links()}}
  @endif
    @else
    <h3>You have added no students.</h3>
  @endif
  <style>
    .btn.pull-left{
      margin-right:5px;
    }
  </style>
@endsection