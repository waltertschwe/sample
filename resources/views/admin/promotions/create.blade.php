@extends('admin.layouts.admin')

@section('title', 'Promotions - Create')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">New Promotion</h3>
	</div>
	<div class="panel-body">
		{!! Form::open([
			'method' => 'POST',
			'class' => 'form-horizontal',
		]) !!}
		<div class="form-group">
			<label class="col-sm-3 control-label">Name:</label>
			<div class="col-sm-4">
				{!! Form::text('name', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Promotional Code:</label>
			<div class="col-sm-4">
				{!! Form::text('name', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Start Date:</label>
			<div class="col-sm-2 input-group date" id="datepicker1">
				{!! Form::text('start_date', '', ['class' => 'form-control input-sm']) !!}
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">End Date:</label>
			<div class="col-sm-2 input-group date" id="datepicker2">
				{!! Form::text('end_date', '', ['class' => 'form-control input-sm']) !!}
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Description:</label>
			<div class="col-sm-4 input-group date" id="datepicker2">
				{!! Form::textarea('description', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">The user must have an: </label>
			{!! Form::select('must_have', 
				$products, 
				'',
				['placeholder' => '-- Please Choose --']
			) !!}
		</div>
		
		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">The user must NOT have an: </label>
			{!! Form::select('must_not_have', 
				$products, 
				'',
				['placeholder' => '-- Please Choose --']
			) !!}
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function () {
		$("#datepicker1").datepicker();
		$("#datepicker2").datepicker();
	});
</script>
@endsection