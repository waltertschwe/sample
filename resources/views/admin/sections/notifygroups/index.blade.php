@extends('admin.layouts.admin')

@section('title', 'Notification Groups')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Notification Groups</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Notify Group ID</th>
						<th>Name</th>
						<th>Type</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if ($groups)
						@foreach ($groups as $group)
						<tr>
							<td>{{ $group->notification_group_id }}</td>
							<td><b>{{ $group->name }}</b></td>
							<td>{{ $group->alert_type }}</td>
							<td>
								<a href={{ route('notification_group_show', [
									'notification_group_id' => $group->notification_group_id]
									) 
								}}
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
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