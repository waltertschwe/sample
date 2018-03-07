@extends('admin.layouts.admin')

@section('title', 'Product Update')

@section('content') 

<div class="panel panel-default">
	<div class="panel-heading">Actions</div>
	<div class="panel-body">
	<a href="" 
		class="btn btn-default">
		<i class="fa fa-edit" aria-hidden="true"></i> Products
	</a>
	<span class="button-spacer"></span>
	<a href="/suspend/1" class="btn btn-default">
		<i class="fa fa-wrench" aria-hidden="true"></i> One Time Charges
	</a>
	<span class="button-spacer"></span>
	<a href="" 
		class="btn btn-default">
		<i class="fa fa-money" aria-hidden="true"></i> Change Credit Card
	</a>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">User Profile - {{ $user->firstname }} {{ $user->lastname }}</h3>
	</div>
	<div class="panel-body">
	{!! Form::model($user, [
		'action' => ['Admin\AdminController@userProfile', $user->user_id],
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
		<label class="col-sm-3 control-label">Alt Email:</label>
			<div class="col-sm-4">
			{!! Form::text('alt_email', $user->alt_email, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label"><i>NEW</i> Password:</label>
			<div class="col-sm-4">
			<!-- TODO: disabling new password update possible to add maybe 
				another page that specifically executes this feature -->
			{!! Form::text('', '', ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Cell Phone Number:</label>
			<div class="col-sm-4">
			{!! Form::text('cell_number', $user->cell_number, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Phone Number:</label>
			<div class="col-sm-4">
			{!! Form::text('phone', $user->phone, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<hr/>
	<div class="form-group">
		<!-- NOTE: Name fields are removed from address data because they are read-only -->
		<label class="col-sm-3 control-label">Address:</label>
			<div class="col-sm-4">
			{!! Form::text('', $address->address, ['class' => 'form-control input-sm', 'readonly' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Address 2:</label>
			<div class="col-sm-4">
			{!! Form::text('', $address->address2, ['class' => 'form-control input-sm', 'readonly' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">City:</label>
			<div class="col-sm-4">
			{!! Form::text('', $address->city, ['class' => 'form-control input-sm', 'readonly' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">State:</label>
			<div class="col-sm-4">
			{!! Form::text('', $address->state, ['class' => 'form-control input-sm', 'readonly' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Zip:</label>
			<div class="col-sm-4">
			{!! Form::text('', $address->zip, ['class' => 'form-control input-sm', 'readonly' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Country:</label>
			<div class="col-sm-4">
			{!! Form::text('', $address->country, ['class' => 'form-control input-sm', 'readonly' => true]) !!}
		</div>
	</div>
	<hr/>
	<div class="form-group">
		<label class="col-sm-3 control-label">Business Name:</label>
			<div class="col-sm-4">
			{!! Form::text('business', $user->business, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">No Contact:</label>
			<div class="col-sm-4">
			{!! Form::checkbox('no_contact[]', $user->no_contact, $user->no_contact) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Is Duplicate:</label>
			<div class="col-sm-4">
			{!! Form::checkbox('is_duplicate[]', $user->is_duplicate, $user->is_duplicate) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Heard About:</label>
			<div class="col-sm-4">
			{!! Form::text('heard_about', $user->heard_about, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Notes:</label>
			<div class="col-sm-8">
			{!! Form::textarea('notes', $user->notes, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Update Profile"/>
		</div>
	</div>
	{!! Form::close() !!}
	</div>
</div>
@endsection