@extends('admin.layouts.admin')

@section('title', 'Section Types')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Section Types</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Section ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sectionTypes as $sectionType)
					<tr>
						<td>{{ $sectionType->section_type_id }}</td>
						<td><b>{{ $sectionType->section_type }}</b></td>
						<td>{{ $sectionType->type_description }}</td>
						<td>
							<a href={{ route('section_type_show', [
								'website_id' => $website->website_id,
								'section_type_id' => $sectionType->section_type_id
								]) }}
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection