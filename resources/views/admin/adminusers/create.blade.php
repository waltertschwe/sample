@extends('admin.layouts.admin')

@section('title', 'Admin Create')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Create New Admin For -- "{{ $website->name }}"</h3>
	</div>
	<div class="panel-body">
		{!! Form::open([
			'method' => 'POST',
			'class' => 'form-horizontal',
		]) !!}
		<div class="form-group">
			<label class="col-sm-3 control-label">First Name:</label>
			<div class="col-sm-4">
				{!! Form::text('firstname', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Last Name:</label>
			<div class="col-sm-4">
				{!! Form::text('lastname', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Email:</label>
			<div class="col-sm-4">
				{!! Form::text('email', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Password:</label>
			<div class="col-sm-4">
				{!! Form::text('password', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Confirm Password:</label>
			<div class="col-sm-4">
				{!! Form::text('confirm_password', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<hr/>
		<h3>Section - Admin Access</h3>
		<p>
			Click the checkbox next to the section(s) you would like your new administrator 
			to have permissions to:
		</p>
		@foreach ($sections as $section) 
			<div class="form-group section-group col-md-6 col-sm-6">
				{!! Form::checkbox('user_section[]', $section->section_id) !!}
				<label for="room_name">{{ $section->name }}</label>
			</div>
		@endforeach
		<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Create Admin"/>
		</div>
	</div>
	{!! Form::close() !!}
	</div>
</div>
@endsection