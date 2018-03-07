@extends('admin.layouts.admin')

@section('title', 'Section Create')

@section('content') 

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Create Section</h3>
	</div>
	<div class="panel-body">
		{!! Form::open([
			'route' => ['section_store', $website->website_id],
			'method' => 'POST',
			'class' => 'form-horizontal',
		]) !!}
		<div class="form-group">
			<label class="col-sm-3 control-label">Section Name:</label>
			<div class="col-sm-4">
				{!! Form::text('name', '', ['class' => 'form-control input-sm', 'required' => true]) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Room Name:</label>
			<div class="col-sm-4">
				{!! Form::text('room_name', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">URL Path:</label>
			<div class="col-sm-4">
				{!! Form::text('url_path', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Description:</label>
			<div class="col-sm-4">
				{!! Form::text('description', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Email Description:</label>
			<div class="col-sm-4">
				{!! Form::text(
					'email_description', 
					'', 
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
		<h4>Choose the section type this section will be.</h4>
		<div class="checkbox-group">
			@foreach($sectionTypes as $sectionType)
			<div class="checkbox-group">
				<label class="checkbox-inline">
				{!! Form::radio(
						'section_type_id',
						$sectionType->section_type_id,
						['class' => 'form-control input-sm', 'required' => true]
					) 
				!!}
				<b>{{ $sectionType->section_type }}</b>
				@if ($sectionType->type_description)
					- {{ $sectionType->type_description }}
				@endif
				</label>
			</div>
			@endforeach
		</div>
		<hr/>
		<h4>You can ignore these fields if you don't know what they are.</h4>
		<div class="form-group">
			<label class="col-sm-3 control-label">New Entry File:</label>
			<div class="col-sm-4">
				{!! Form::text('new_entry_file', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Edit Entry File:</label>
			<div class="col-sm-4">
				{!! Form::text('edit_entry_file', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Trading Room Fields File:</label>
			<div class="col-sm-4">
				{!! Form::text('room_fields_file', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Table:</label>
			<div class="col-sm-4">
				{!! Form::text('content_table', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">HTML File Add Comments:</label>
			<div class="col-sm-4">
				{!! Form::text('html_add_comments', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alt Trading Room Category:</label>
			<div class="col-sm-4">
				{!! Form::text('alt_room_category', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alt Trading Room Header:</label>
			<div class="col-sm-6">
				{!! Form::textarea('alt_room_header', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Example Email:</label>
			<div class="col-sm-6">
				{!! Form::textarea('example_email', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Example SMS:</label>
			<div class="col-sm-4">
				{!! Form::text('example_sms', '', ['class' => 'form-control input-sm']) !!}
			</div>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="form-group spacer-top col-md-3 col-sm-3 pull-left" >
				<input type="submit" class="btn btn-primary" value="Create Section"/>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection