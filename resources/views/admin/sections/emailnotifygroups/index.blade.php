@extends('admin.layouts.admin')

@section('title', 'Email Notify Groups')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Email Notify Groups</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Email Notify Group ID</th>
						<th>Category Name</th>
						<th>Group Name</th>
						<th>Product Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if ($groups)
						@foreach ($groups as $group)
						<tr>
							<td>{{ $group->product_id }}</td>
							<td><b>{{ $group->name }}</b></td>
							<td>{{ $group->group_name }}</td>
							<td>{{ $group->product_name }}</td>
							<td>
								<a href={{ route('product_show', ['product_id' => $group->notify_group_id]) }}
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								</a>
								<a href={{ route('product_delete', ['product_id' => $group-notify_group_id]) }}
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</a>
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection