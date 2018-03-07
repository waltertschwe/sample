@extends('admin.layouts.admin')

@section('title', 'Admin Edit')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Edit Admin For -- "{{ $website->name }}"</h3>
	</div>
	<div class="panel-body">
		{!! Form::model($user, [
			'action' => ['Admin\AdminController@adminUpdate', $website->website_id, $user->user_id],
			'method' => 'PUT',
			'class' => 'form-horizontal',
		]) !!}
		<div class="form-group">
			<label class="col-sm-3 control-label">First Name:</label>
			<div class="col-sm-4">
				{!! Form::text('firstname', $user->firstname, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Last Name:</label>
			<div class="col-sm-4">
				{!! Form::text('lastname', $user->lastname, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Email:</label>
			<div class="col-sm-4">
				{!! Form::text('email', $user->email, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Password:</label>
			<div class="col-sm-4">
				{!! Form::text('password', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Confirm Password:</label>
			<div class="col-sm-4">
				{!! Form::text('confirm_password', '', ['class' => 'form-control input-sm']) !!}
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
				{!! Form::checkbox(
					'user_section[]', 
					$section->section_id, 
					(in_array($section->section_id, $sectionsSelected) ? 1 : 0)) 
				!!}
				<label for="room_name">{{ $section->name }}</label>
			</div>
		@endforeach
		<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Update Admin"/>
		</div>
	</div>
	{!! Form::close() !!}
	</div>
</div>
@endsection