@extends('admin.layouts.admin')

@section('title', 'Billing Plan - Update')

@section('content') 

<div class="panel panel-default">
	<div class="panel-heading">Product Billing Plan Actions</div>
	<div class="panel-body">
	<a href="{{ route('product_show', ['product_id' => $product->product_id]) }}" 
		class="btn btn-default">
		<i class="fa fa-edit" aria-hidden="true"></i> Edit Product
	</a>
	<span class="button-spacer"></span>
	<a href="" class="btn btn-default">
		<i class="fa fa-wrench" aria-hidden="true"></i> Update Content
	</a>
	<span class="button-spacer"></span>
	<a href="{{ route('billing_index', ['product_id' => $product->product_id]) }}" 
		class="btn btn-default">
		<i class="fa fa-edit" aria-hidden="true"></i> View Billing Plans
	</a>
	<span class="button-spacer"></span>
	<a href="{{ route('billing_create', ['product_id' => $product->product_id]) }}" 
		class="btn btn-default">
		<i class="fa fa-money" aria-hidden="true"></i> Add A Billing Plan
	</a>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Update "{{ $plan->name }}" Billing Plan -- For Product "{{ $product->name }}"</h3>
	</div>
	<div class="panel-body">
		{!! Form::model($plan, [
			'action' => ['Admin\ProductBillingController@update', $plan->billing_plan_id],
			'method' => 'PUT',
			'class' => 'form-horizontal',
		]) !!}
		<div class="form-group">
			<label class="col-sm-3 control-label">Name:</label>
			<div class="col-sm-4">
				{!! Form::text('name', $plan->name, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Free Trial Days:</label>
			<div class="col-sm-4">
				{!! Form::text('free_trial_days', $plan->free_trial_days, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Extend Free Trial Days:</label>
			<div class="col-sm-4">
				{!! Form::text('extend_free_trial_days', $plan->extend_free_trial_days, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Periodicity:</label>
			<div class="input-group col-sm-4">
				{!! Form::select('periodicity',
					$periodicity, 
					$plan->periodicity
				) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">First Month Price:</label>
			<div class="input-group col-sm-4">
				<div class="input-group-addon">$</div>
				{!! Form::text('first_month_price', $plan->first_month_price, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Price:</label>
			<div class="input-group col-sm-4">
				<div class="input-group-addon">$</div>
				{!! Form::text('price', $plan->price, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
				<input type="submit" class="btn btn-primary" value="Update Plan"/>
			</div>
		</div>
	{!! Form::close() !!}
	</div>
</div>
@endsection