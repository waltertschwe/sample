@extends('admin.layouts.admin')

@section('title', 'Section Type Update')

@section('content') 

<div class="panel panel-success" style="margin:20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Update Section Type - {{ $sectionType->section_type }}</h3>
	</div>
	<div class="panel-body">
	{!! Form::model($sectionType, [
		'action' => ['Admin\SectionTypesController@update', $website->website_id, $sectionType->section_type_id],
		'method' => 'PUT',
		'class' => 'form-horizontal',
	]) !!}
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Name:</label>
		<div class="col-sm-4">
			{!! Form::text('section_type', $sectionType->section_type, ['class' => 'form-control input-sm', 'required' => true]) !!}
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Class:</label>
		<div class="col-sm-4">
			{!! Form::text('class', $sectionType->class, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Description:</label>
		<div class="col-sm-4">
			{!! Form::textarea('type_description', $sectionType->type_description, ['class' => 'form-control input-sm']) !!}
		</div>
	</div>

	<div class="col-md-12 col-sm-12">
		<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
			<input type="submit" class="btn btn-primary" value="Update Section Type"/>
		</div>
	</div>
	{!! Form::close() !!}
	</div>
</div>


@endsection