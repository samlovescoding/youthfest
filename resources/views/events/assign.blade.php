<?php
  use App\EventRelations;

?>
@extends('dashboard.layout')

@section('content')
  <h1>Assign Students to {{$event->name}} Event</h1>
  @if(count($students) > 0)

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Participants</div>
          <div class="panel-body">
            @if($event->max_participants != 0)
              <div class="progress"><div class="progress-bar progress-bar-success" style="width: {{($total_participants_assigned/$event->max_participants)*100}}%"></div></div>
            @else
              <div class="progress"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>
            @endif
            <h2>{{$total_participants_assigned}}/{{$event->max_participants}} <small>Students Assigned</small></h2>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Accomplices</div>
          <div class="panel-body">
            @if($event->max_accomp != 0)
              <div class="progress"><div class="progress-bar progress-bar-success" style="width: {{$total_accomp_assigned/$event->max_accomp}}%"></div></div>
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
          <th width="20%">Controls</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($students as $student)
    <?php
      $student_relations_to_events = EventRelations::where([
        ["event", '=', $event->id],
        ["student", '=', $student->id]
      ])->count();
      $student_relations_to_other_events = EventRelations::where([
        ["student", '=', $student->id]
      ])->count();
      $display_color = "";
      $is_assign = false;
      if($student_relations_to_events > 0){
        $is_assign = true;
        $display_color = "success";
      }else{
        if($student_relations_to_other_events > 0){
          $display_color = "warning";
        }
      }
      $accomplice = "";
      if($student->participating_as === "student_accomp"){
        $accomplice = " <b>(Accomplice)</b>";
      }
    ?>
        <tr class="{{$display_color}}">
          <td>{{$student->roll_number}}</td>
          <td>{{$student->name}}{!!$accomplice!!}</td>
          <td>{{$student->class}} {{$student->branch}}</td>
          <td>{{$student->university_registration}}</td>
          <td>
            @if($is_assign)
              <a href="{{action("EventsController@deassign", [$event->id, $student->id])}}" class="btn btn-danger btn-xs pull-left">Remove</a>
            @else
              @if($student->participating_as == "participant")
                @if($can_assign_participant)
                <a href="{{action("EventsController@assign_create", [$event->id, $student->id])}}" class="btn btn-info btn-xs pull-left">Assign</a>
                @endif
              @endif
              @if($student->participating_as == "accomp")
                @if($can_assign_accomp)
                <a href="{{action("EventsController@assign_create", [$event->id, $student->id])}}" class="btn btn-info btn-xs pull-left">Assign</a>
                @endif
              @endif
              
            @endif
          </td>
        </tr>
    @endforeach
      </tbody>
    </table>
    <div class="legend">
      <h4>Color Definition used in Table</h4>
      <span class="bg-warning">Student is assigned to Another Event</span>
      <span class="bg-success">Student is assigned to This Event</span>
      <span class="bg-default">Student is assigned to No Event</span>
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