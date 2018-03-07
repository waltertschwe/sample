@extends('admin.layouts.admin')

@section('title', 'Admin Users')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Admin Users</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>User ID</th>
						<th>Name</th>
						<th>Chat Handle</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->user_id }}</td>
						<td><b>{{ $user->firstname }} {{ $user->lastname }}</b></td>
						<td>{{ $user->chat_handle }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href="{{ route(
								'admin_show', 
								['website_id' => $website->website_id,
								'user_id' => $user->user_id]) }}"
								<i class="fa fa-wrench" aria-hidden="true"></i>
							</a>
							<a href=""
								<i class="fa fa-trash" aria-hidden="true"></i>
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