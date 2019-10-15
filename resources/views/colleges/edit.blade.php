@extends('dashboard.layout')

@section('content')
	<h1>Edit College {{$college->name}}</h1>
	{!! Form::open(['action' => ['CollegesController@update', $college->id], 'method' => 'POST']) !!}
		
		<div class="form-group">
			{{Form::label('name', 'College Name')}}
			{{Form::text('name', $college->name, ['class'=> 'form-control', 'placeholder'=>'Enter College Name'])}}
		</div>
		<div class="form-group">
			{{Form::label('uuid', 'College Username')}}
			{{Form::text('uuid', $college->registration_number, ['class'=> 'form-control', 'placeholder'=>'Enter College UUID'])}}
			<p><small>This will not change the college username!</small></p>
		</div>
		<div class="form-group">
			{{Form::label('nickname', 'College Nick Name')}}
			{{Form::text('nickname', $college->nickname, ['class'=> 'form-control', 'placeholder'=>'Enter College Nickname'])}}
		</div>

		{{Form::hidden("_method", "PUT")}}
		
		{{Form::submit('Update', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection