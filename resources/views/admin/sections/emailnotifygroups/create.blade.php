@extends('admin.layouts.admin')

@section('title', 'Add Email Notification Group')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Add a new Email Notification Group</h3>
	</div>
	<div class="panel-body">
		{!! Form::open([
			'method' => 'POST',
			'class' => 'form-horizontal',
		]) !!}
	<div class="form-group">
		<label class="col-sm-3 control-label">Group Name:</label>
		<div class="col-sm-4">
			{!! Form::text('group_name', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Category Name:</label>
		<div class="col-sm-4">
			{!! Form::text('category_name', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Product:</label>
		<div class="col-sm-4">
			{!! Form::text('product_id', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Sort Order:</label>
		<div class="col-sm-4">
			{!! Form::text('sort_order', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
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
			<input type="submit" class="btn btn-primary" value="Add Group"/>
		</div>
	</div>
</div>

@endsection