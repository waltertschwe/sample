@extends('admin.layouts.admin')

@section('title', 'Product Create')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Create Product</h3>
	</div>
	<div class="panel-body">
	{!! Form::open([
		'route' => ['product_store', $website->website_id],
		'method' => 'POST',
	]) !!}
	<div class="col-md-12 col-sm-12">
		<div class="form-group col-md-6 col-sm-6">
			<label for="name">Name	</label>
			{!! Form::text('name', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
		<div class="form-group col-md-6 col-sm-6">
			<label for="room_name">Room Name </label>
			{!! Form::text('room_name', '', ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group col-md-6 col-sm-6">
			<label for="room_name">Prod Email Description </label>
			{!! Form::text('prod_email_description', '', ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-3">
			<label for="room_name">Credit Card Code </label>
			{!! Form::text('credit_card_code', '', ['class' => 'form-control input-sm', 'maxlength' => '3']) !!}
		</div>
		
		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">Is Active </label>
			{!! Form::checkbox('is_active', 1) !!}
			<span class="spacer"></span>
			<label for="room_name">PM Access </label>
			{!! Form::checkbox('is_pm_access', 1) !!}
			<span class="spacer"></span>
			<label for="room_name">Is Alert Recommended</label>
			{!! Form::checkbox('is_alert_recommended', 1) !!}
			<span class="spacer"></span>
			<label for="room_name">Is Institutional</label>
			{!! Form::checkbox('is_institutional', 1) !!}
		</div>
	
		<hr/>
		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">Description </label>
			{!! Form::textarea('description', '', ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">Short Description </label>
			{!! Form::textarea('short_description', '', ['class' => 'form-control input-sm']) !!}
		</div>
		
		<hr/>
		
		<div class="form-group col-md-6 col-sm-6">
			<label for="room_name">Not Subscribed Header </label>
			{!! Form::text('no_sub_header', '', ['class' => 'form-control input-sm']) !!}
		</div>
		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">Not Subscribed Description </label>
			{!! Form::textarea('no_sub_description', '', ['class' => 'form-control input-sm']) !!}
		</div>
		
		<hr>

		<div class="form-group col-md-12 col-sm-12">
			<label for="room_name">Default Post Section </label>
			{!! Form::select('default_post_section_id', 
				$tradingSections, 
				null,
				['placeholder' => '-- None --']
			) !!}
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

		<hr>

		<h3>Section - Product Access</h3>
		<p>
			Click the checkbox next to the section(s) that this product has access to.
		</p>
		@foreach ($sections as $section) 
			<div class="form-group section-group col-md-6 col-sm-6">
				{!! Form::checkbox('product_section[]', $section->section_id) !!}
				<label for="room_name">{{ $section->name }}</label>
			</div>
		@endforeach
	</div>
	<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Create Product"/>
		</div>
	</div>
	{!! Form::close() !!}
	</div>
</div>

<!-- CK EDITORS -->
<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.replace( 'short_description' );
	CKEDITOR.replace( 'no_sub_description' );
</script>

@endsection