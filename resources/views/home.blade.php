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
                        <?php
                            $color = "success";
                            if(($assigned_to_event/($event->max_participants + $event->max_accomp)) > 1){
                                $color = "danger";
                                
                            }    
                        ?>
                        <div class="progress"><div class="progress-bar progress-bar-{{$color}}" style="width: {{($assigned_to_event/($event->max_participants + $event->max_accomp))*100}}%"></div></div>
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

<div class="modal fade" id="instructionModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Instructions</h4>
        </div>
        <div class="modal-body">
            <ol>
                <li>
                    <h3 class="text-danger">Last date for registering students online is <br> 19<sup>th</sup> October 2019 5:00pm.</h3>
                    No registration will be done after the date.
                </li>
                <li>If this is your first time, please <b>CHANGE your PASSWORD</b> immediately.</li>
                <li>No offline registration will be performed. All participants must be registered online before the deadline.</li>
                <li>The IKGPTU youth festival 2019 registration portal works in <b>Google Chrome Only</b>.</li>
                <li>Single registration is required for registering a participant in which he/she is participating.</li>
                <li>Select the events (whichever applicable) from Choose Event section while registering a Participant/ Student Accompanists/Accompanists</li>
                <li>Same procedure is to be followed while registering Student Accompanists/Accompanists.</li>
                <li>The allowed size for uploading participant photo is &lt; 2MB and allowed format is JPEG/PNG.</li>
                <li>
                    Performa I of Participant/Student Accompanist/Accompanist can be printed using online portal. <br>
                    For printing, follow the steps
                    <ol>
                        <li>Press Ctlr+P</li>
                        <li>Change Layout to Potrait</li>
                        <li>In more settings, change Paper Size to A4</li>
                        <li>In more settings, enable Background Graphics</li>
                        <li>In more settings, disable Headers and Footers</li>
                    </ol>
                </li>
            </ol>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $('#instructionModel').modal({
        show:true,
        backdrop:'static',
        keyboard:false
    });
</script>

@endsection
