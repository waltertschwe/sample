@extends('admin.layouts.admin')

@section('title', 'Add Notification Group')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Edit Notification Group</h3>
	</div>
	<div class="panel-body">
		{!! Form::open([
			'method' => 'PUT',
			'class' => 'form-horizontal',
		]) !!}
	<div class="form-group">
		<label class="col-sm-3 control-label">Group Name:</label>
		<div class="col-sm-4">
			{!! Form::text('name', $group->name, ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Sort Order:</label>
		<div class="col-sm-4">
			{!! Form::text('sort_order', $group->sort_order, ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Must Have Product:</label>
		<div class="col-sm-4">
			{!! Form::text('must_have_product_id', $group->must_have_product_id, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Must Not Have Product:</label>
		<div class="col-sm-4">
			{!! Form::text('must_not_have_product_id', $group->must_not_have_product_id, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Default On:</label>
		<div class="col-sm-4">
			{!! Form::checkbox('email_default', 1, $group->email_default) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Description:</label>
		<div class="col-sm-4">
			{!! Form::text('description', $group->description, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Alert Type:</label>
		<div class="col-sm-4">
			{!! Form::select('alert_type', 
				['high', 'medium'], 
				$group->alert_type
			) !!}
		</div>
	</div>
	<hr/>
	<div class="form-group">
		@foreach ($sections as $key => $value ) 
			<div class="form-group section-group col-md-6 col-sm-6">
				{!! Form::checkbox('product_section[]', $key) !!}
				<label for="room_name">{{ $value }}</label>
			</div>
		@endforeach
	</div>
	<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Update Group"/>
		</div>
	</div>
</div>

@endsection
