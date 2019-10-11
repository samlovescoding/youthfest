<?php
    use App\EventRelations;
?>
@extends('dashboard.layout')

@section('content')
    <h1>Dashboard</h1>
    <hr>
    <h3>Stats</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Students</div>
                <div class="panel-body">
                    @if($total_students == 0)
                    <div class="progress"><div class="progress-bar progress-bar-success" style="width: 0%"></div></div>
                    @else
                    <div class="progress"><div class="progress-bar progress-bar-success" style="width: {{($total_assigned/$total_students)*100}}%"></div></div>
                    @endif
                    Enrolled Students : {{$total_students}} <br>
                    Assigned Students : {{$total_assigned}}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>Events</h3>

    <div class="row">
    <?php $i = -1; ?>
    @foreach ($events as $event)
    <?php $i++; ?>
    
    @if($i == 4)
    </div>
    <div class="row">
    <?php $i = 0; ?>
    @endif
            <?php
                $assigned_to_event = 0;
                $student_list = [];
                foreach ($students as $student) {
                    $assign = EventRelations::where('student', $student->id)->where('event', $event->id)->count();
                    if($assign > 0){
                        $assigned_to_event++;
                        $student_list[] = $student->name;
                    }
                }                
            ?>
            <div class="col-md-3">
                <div class="panel panel-default panel-event">
                    <div class="panel-heading">{{$event->name}}</div>
                    <div class="panel-body">
                        <div class="progress"><div class="progress-bar progress-bar-success" style="width: {{($assigned_to_event/($event->max_participants + $event->max_accomp))*100}}%"></div></div>
                        <p>{{$assigned_to_event}}/{{($event->max_participants + $event->max_accomp)}} <small>Students Assigned</small></p>
                        <hr>
                        <ol>
                            @foreach($student_list as $student)
                                <li>{{$student}}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="panel-footer">
                        <a href="{{action("EventsController@assign", ["id"=>$event->id])}}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <style>
        .panel-event .panel-body p{
            font-size:28px;
            font-weight: bolder;
        }
        .panel-event .panel-body p small{
            font-size:16px;
            font-weight: normal;
        }
    </style>

@endsection
