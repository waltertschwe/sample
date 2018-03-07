@extends('admin.layouts.admin')

@section('title', 'Sections')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Sections</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Section ID</th>
						<th>Name</th>
						<th>Is Active</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Section ID</th>
						<th>Name</th>
						<th>Is Active</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($sections as $section)
					<tr>
						<td>{{ $section->section_id }}</td>
						<td><b>{{ $section->name }}</b></td>
						<td>{{ $section->is_active ? 'True' : 'False' }}</td>
						<td>
							<a href={{ route('section_show', ['section_id' => $section->section_id]) }}
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</a>
							<a href={{ route('section_delete', ['section_id' => $section->section_id]) }}
							onclick="return confirm('Are you sure you want to delete {{ $section->name}} ');"
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection