@extends('admin.layouts.admin')

@section('title', 'Section Update')

@section('content') 
<div class="well">
	<center><b>{{ $section->sectiontype->section_type }}</b></center>
	<center><p>{{ $section->sectiontype->section_type_description }}</p></center>
</div>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Update Section - {{ $section->name }}</h3>
	</div>
	<div class="panel-body">
	{!! Form::model($section, [
		'action' => ['Admin\SectionsController@update', $section->section_id],
		'method' => 'PUT',
		'class' => 'form-horizontal',
	]) !!}
	<div class="form-group">
			<label class="col-sm-3 control-label">Section Name:</label>
			<div class="col-sm-4">
				{!! Form::text('name', $section->name, ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Room Name:</label>
			<div class="col-sm-4">
				{!! Form::text('room_name', $section->room_name, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">URL Path:</label>
			<div class="col-sm-4">
				{!! Form::text('url_path', $section->url_path, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Description:</label>
			<div class="col-sm-4">
				{!! Form::text('description', $section->description, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Email Description:</label>
			<div class="col-sm-4">
				{!! Form::text(
					'email_description', 
					$section->email_description, 
					['class' => 'form-control input-sm']) 
				!!}
			</div>
		</div>
		<div class="checkbox-group">
			@foreach($checkboxes as $key => $value)
				<div class="checkbox-group">
					<label class="checkbox-inline">
						{!! Form::checkbox(
								$key
							)
						!!}
						{{ $value }}
					</label>
				</div>
			@endforeach
		</div>
		<hr/>

		<h4>You can ignore these fields if you don't know what they are.</h4>
		<div class="form-group">
			<label class="col-sm-3 control-label">New Entry File:</label>
			<div class="col-sm-4">
				{!! Form::text('new_entry_file', $section->new_entry_file, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Edit Entry File:</label>
			<div class="col-sm-4">
				{!! Form::text('edit_entry_file', $section->edit_entry_file, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Trading Room Fields File:</label>
			<div class="col-sm-4">
				{!! Form::text('room_fields_file', $section->room_fields_file, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Table:</label>
			<div class="col-sm-4">
				{!! Form::text('content_table', $section->content_table, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">HTML File Add Comments:</label>
			<div class="col-sm-4">
				{!! Form::text('html_add_comments', $section->html_add_comments, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alt Trading Room Category:</label>
			<div class="col-sm-4">
				{!! Form::text('alt_room_category', $section->alt_room_category, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alt Trading Room Header:</label>
			<div class="col-sm-6">
				{!! Form::textarea('alt_room_header', $section->alt_room_header, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Example Email:</label>
			<div class="col-sm-6">
				{!! Form::textarea('example_email', $section->example_email, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Example SMS:</label>
			<div class="col-sm-4">
				{!! Form::text('example_sms', $section->example_sms, ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
				<input type="submit" class="btn btn-primary" value="Update Section"/>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection