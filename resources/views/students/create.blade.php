@extends('dashboard.layout')

@section('content')
	<h1>Student Registration Form</h1>
	{!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
		
		<div class="form-group">
			{{Form::label('name', 'Name')}}
			{{Form::text('name', '', ['class'=> 'form-control', 'placeholder'=>'Enter student name here'])}}
		</div>
		<div class="form-group">
			{{Form::label('father_name', 'Father\'s Name')}}
			{{Form::text('father_name', '', ['class'=> 'form-control', 'placeholder'=>'Enter father\'s name here'])}}
		</div>
		<div class="form-group">
			{{Form::label('date_birth', 'Date of Birth')}}
			{{Form::date('date_birth', '', ['class'=> 'form-control', 'placeholder'=>'Choose the DoB'])}}
		</div>
		<div class="form-group">
			{{Form::label('participating_as', 'Participating As')}}
			{{Form::select('participating_as', ['participant'=>"Participant", 'student_accomp'=>"Student Accomplice", 'accomp'=>"Accomplice"], 'participant', ['class'=> 'form-control' ])}}
		</div>

		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('class', 'Class')}}
					{{Form::text('class', '', ['class'=> 'form-control', 'placeholder'=>'Enter current class here'])}}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('branch', 'Branch')}}
					{{Form::text('branch', '', ['class'=> 'form-control', 'placeholder'=>'Enter current branch here'])}}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('roll_number', 'Roll No.')}}
					{{Form::text('roll_number', '', ['class'=> 'form-control', 'placeholder'=>'Enter current roll no. here'])}}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{{Form::label('university_registration', 'University Registration No.')}}
					{{Form::text('university_registration', '', ['class'=> 'form-control', 'placeholder'=>'Enter uni. regn. no.'])}}
				</div>
			</div>
		</div>

		<div class="form-group">
			{{Form::label('year_of_passing', 'Year of Passing Class 12th')}}
			{{Form::selectRange('year_of_passing', 1990, 2005, 2000, ['class'=> 'form-control', 'placeholder'=>'Enter the year student passed class 12th'])}}
		</div>

		<div class="form-group">
			{{Form::label('address', 'Address')}}
			{{Form::textarea('address', '', ['class'=> 'form-control', 'placeholder'=>'Enter home address'])}}
		</div>

		<div class="form-group">
			{{Form::label('student_photo', 'Student Photo')}}
			{{Form::file('student_photo', ['class'=> 'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('event_list', 'Choose Events')}}
			{{Form::select('event_list[]', $event_list, null, ['class'=> 'form-control', 'multiple' => 'multiple'])}}
			<p><small>Use Ctrl key to select multiple events.</small></p>
		</div>
		
		{{Form::submit('Create', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection