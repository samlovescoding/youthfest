<?php
  use App\Event;
  use App\EventRelations;
  $event_relations = EventRelations::where("student", $student->id)->get();
  $event_string = "";
  $total_events = 0;
  foreach ($event_relations as $event_relation) {
    $event = Event::find($event_relation->event);
    $event_string .= $event->name . ", ";
    $total_events++;
  }
  $event_string = rtrim($event_string, ", ");

?>

@extends('dashboard.layout')

@section('content')
  <a href="/students"></a>
  <h1>Student Information</h1>
  <a href="/students/" class="btn btn-default">Go Back</a>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th width="30%">Information</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Image</td>
        <td><img src="/storage/studentPhotos/{{$student->student_photo}}" style="height:250px;"></td>
      </tr>
      <tr>
        <td>Name</td>
        <td>{{$student->name}}</td>
      </tr>
      <tr>
        <td>Father's Name</td>
        <td>{{$student->father_name}}</td>
      </tr>
      <tr>
        <td>Date of Birth</td>
        <td>{{$student->date_birth}}</td>
      </tr>
      <tr>
        <td>Class</td>
        <td>{{$student->class}} {{$student->branch}}</td>
      </tr>
      <tr>
        <td>Roll Number</td>
        <td>{{$student->roll_number}}</td>
      </tr>
      <tr>
        <td>University Registration Number</td>
        <td>{{$student->university_registration}}</td>
      </tr>
      <tr>
        <td>Year of Passing</td>
        <td>{{$student->year_of_passing}}</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>{{$student->address}}</td>
      </tr>
      <tr>
        <td>Events Assigned To ({{$total_events}})</td>
        <td>
            {{$event_string}}
        </td>
      </tr>
    </tbody>
  </table>
  @if($user_id == 1)
    <a href="/students/{{$student->id}}/id-card" class="btn btn-primary">Generate ID Card</a>
  @endif
  <a href="/students/{{$student->id}}/edit" class="btn btn-info">Edit</a>
  <a href="/students/{{$student->id}}/print" class="btn btn-success">Print</a>
  <a href="/students/{{$student->id}}/delete" class="btn btn-danger">Delete</a>
@endsection