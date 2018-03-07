@extends('admin.layouts.admin')

@section('title', 'Add Notification Group')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Add a new Notification Group</h3>
	</div>
	<div class="panel-body">
		{!! Form::open([
			'method' => 'POST',
			'route' => ['notification_group_store', $website->website_id],
			'class' => 'form-horizontal',
		]) !!}
	<div class="form-group">
		<label class="col-sm-3 control-label">Group Name:</label>
		<div class="col-sm-4">
			{!! Form::text('name', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Sort Order:</label>
		<div class="col-sm-4">
			{!! Form::text('sort_order', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Must Have Product:</label>
		<div class="col-sm-4">
			{!! Form::text('must_have_product_id', '', ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Must Not Have Product:</label>
		<div class="col-sm-4">
			{!! Form::text('must_not_have_product_id', '', ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Default On:</label>
		<div class="col-sm-4">
			{!! Form::checkbox('email_default', 1) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Description:</label>
		<div class="col-sm-4">
			{!! Form::text('description', '', ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Description:</label>
		<div class="col-sm-4">
			{!! Form::select('alert_type', 
				['high', 'medium'], 
				'',
				['placeholder' => '-- Please Choose --', 'required' => true]
			) !!}
		</div>
	</div>
	<hr/>
	<div class="form-group">
		@foreach ($sections as $key => $value ) 
			<div class="form-group group_section col-md-6 col-sm-6">
				{!! Form::checkbox('group_section[]', $key) !!}
				<label for="room_name">{{ $value }}</label>
			</div>
		@endforeach
	</div>
	<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Add Group"/>
		</div>
	</div>
</div>

@endsection
