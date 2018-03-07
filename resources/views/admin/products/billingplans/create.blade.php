@extends('admin.layouts.admin')

@section('title', 'Billing Plan - Create')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Create Billing Plan -- For Product "{{ $product->name }}"</h3>
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
			<label class="col-sm-3 control-label">Free Trial Days:</label>
			<div class="col-sm-4">
				{!! Form::text('free_trial_days', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Extend Free Trial Days:</label>
			<div class="col-sm-4">
				{!! Form::text('extend_free_trial_days', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Periodicity:</label>
			<div class="input-group col-sm-4">
				{!! Form::select('periodicity',
					$periodicity, 
					'Monthly'
				) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">First Month Price:</label>
			<div class="input-group col-sm-4">
				<div class="input-group-addon">$</div>
				{!! Form::text('first_month_price', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Price:</label>
			<div class="input-group col-sm-4">
				<div class="input-group-addon">$</div>
				{!! Form::text('price', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
				<input type="submit" class="btn btn-primary" value="Create Plan"/>
			</div>
		</div>
	{!! Form::close() !!}
	</div>
</div>
@endsection