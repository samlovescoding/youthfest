@extends('dashboard.layout')

@section('content')
	<h1>Edit Student Registration Form</h1>
	{!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		
		<div class="row">
			<div class="col-md-8" id="editForm-left">
				<div class="form-group">
					{{Form::label('name', 'Name')}}
					{{Form::text('name', $student->name, ['class'=> 'form-control', 'placeholder'=>'Enter student name here'])}}
				</div>
				<div class="form-group">
					{{Form::label('father_name', 'Father\'s Name')}}
					{{Form::text('father_name', $student->father_name, ['class'=> 'form-control', 'placeholder'=>'Enter father\'s name here'])}}
				</div>
				<div class="form-group">
					{{Form::label('date_birth', 'Date of Birth')}}
					{{Form::date('date_birth', $student->date_birth, ['class'=> 'form-control', 'placeholder'=>'Choose the DoB'])}}
				</div>
				<div class="form-group">
					{{Form::label('participating_as', 'Participating As')}}
					{{Form::select('participating_as', ['participant'=>"Participant", 'accomp'=>"Accompanist", 'student_accomp'=>"Student Accompanist"], $student->participating_as, ['class'=> 'form-control' ])}}
				</div>
			</div>
			<div class="col-md-4" id="editForm-right">
				<img src="/storage/studentPhotos/{{$student->student_photo}}" class="">
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<style>
			#editForm-right{
				text-align:right;
			}
		</style>
		<script>
			$(document).ready(()=>{
				height = $("#editForm-left").height();
				$("#editForm-right").height(height + "px");
				height = height - 30;
				$("#editForm-right img").height(height + "px");
			});
		</script>
		
			<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('class', 'Class')}}
					{{Form::text('class', $student->class, ['class'=> 'form-control', 'placeholder'=>'Enter current class here'])}}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('branch', 'Branch')}}
					{{Form::text('branch', $student->branch, ['class'=> 'form-control', 'placeholder'=>'Enter current branch here'])}}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('roll_number', 'Roll No.')}}
					{{Form::text('roll_number', $student->roll_number, ['class'=> 'form-control', 'placeholder'=>'Enter current roll no. here'])}}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('university_registration', 'University Registration No.')}}
					{{Form::text('university_registration', $student->university_registration, ['class'=> 'form-control', 'placeholder'=>'Enter uni. regn. no.'])}}
				</div>
			</div>
		</div>

		<div class="form-group">
			{{Form::label('year_of_passing', 'Year of Passing Class 12th')}}
			{{Form::selectRange('year_of_passing', 1990, 2020, $student->year_of_passing, ['class'=> 'form-control', 'placeholder'=>'Enter the year student passed class 12th'])}}
		</div>

		<div class="form-group">
			{{Form::label('address', 'Address')}}
			{{Form::textarea('address', $student->address, ['class'=> 'form-control', 'placeholder'=>'Enter home address'])}}
		</div>

		<div class="form-group">
			{{Form::label('student_photo', 'Student Photo')}}
			{{Form::file('student_photo', ['class'=> 'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('event_list', 'Choose Events')}}<br>
			@foreach($event_list as $event)
				<?php
					$is_part = false;
					foreach ($event_relations as $event_relation) {
						if($event_relation->event == $event->id){
							$is_part = true;
						}
					}
				if(!$is_part)
				if($event->assigned >= ($event->max_participants+$event->max_accomp))
				continue;
				?>
				{{Form::checkbox('event_list[' . $event->id . ']', "true", $is_part)}} {{$event->name}} ({{$event->assigned}}/{{$event->max_participants+$event->max_accomp}}) <br>
			@endforeach
		</div>
		
			{{Form::hidden("_method", "PUT")}}
		{{Form::submit('Update', ['class'=>'btn btn-primary'])}}
		<a href="/students/" class="btn btn-default">Go Back</a>
	{!! Form::close() !!}
@endsection