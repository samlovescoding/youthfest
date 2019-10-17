<?php
  use App\EventRelations;

?>
@extends('dashboard.layout')

@section('content')
  <h1>View Students of {{$event->name}} Event</h1>
  @if(count($students) > 0)

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Participants</div>
          <div class="panel-body">
            @if($event->max_participants != 0)
              <?php 
                $color = "success"; 
                if($total_participants_assigned/$event->max_participants > 1){
                  $color = "danger";
                }
              ?>
              <div class="progress"><div class="progress-bar progress-bar-{{$color}}" style="width: {{($total_participants_assigned/$event->max_participants)*100}}%"></div></div>
            @else
              <div class="progress"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>
            @endif
            <h2>{{$total_participants_assigned}}/{{$event->max_participants}} <small>Students Assigned</small></h2>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Accompanists</div>
          <div class="panel-body">
            @if($event->max_accomp != 0)
              <div class="progress"><div class="progress-bar progress-bar-success" style="width: {{($total_accomp_assigned/$event->max_accomp)*100}}%"></div></div>
            @else
              <div class="progress"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>
            @endif
            <h2>{{$total_accomp_assigned}}/{{$event->max_accomp}} <small>Students Assigned</small></h2>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="10%">Roll Number</th>
          <th width="30%">Name</th>
          <th width="15%">Class</th>
          <th width="20%">University Registration No.</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($students as $student)
    <?php
      $display_color = "success";
      $is_assign = false;
      $accomplice = "";
      if($student->participating_as === "student_accomp"){
        $display_color = "warning";
        $accomplice = " <b>(Accompanist)</b>";
      }
      if($student->participating_as === "accomp"){
        $display_color = "danger";
        $accomplice = " <b>(Non Student Accompanist)</b>";
      }
    ?>
        <tr class="{{$display_color}}">
          <td>{{$student->roll_number}}</td>
          <td>{{$student->name}}{!!$accomplice!!}</td>
          <td>{{$student->class}} {{$student->branch}}</td>
          <td>{{$student->university_registration}}</td>
        </tr>
    @endforeach
      </tbody>
    </table>
    <div class="legend">
      <h4>Color Definition used in Table</h4>
      <span class="bg-success">Student Participant</span>
      <span class="bg-warning">Student Accompanist</span>
      <span class="bg-danger">Non-Student Accompanist</span>
    </div>
  @else
    <h3>You have added no students.</h3>
  @endif
  <style>
    .btn.pull-left{
      margin-right:5px;
    }
    .legend span{
      padding:5px;
      box-shadow:2px 2px 4px 0px rgba(0,0,0,0.1);
      border-radius:3px;
      margin-right:20px;
    }
  </style>
@endsection