@extends('admin.layouts.admin')

@section('title', 'Historical Promotions')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Historical Promotions</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Promotion Plan ID</th>
						<th>Promotion Name</th>
						<th>Refferral Code</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($promotions as $promotion)
					<tr>
						<td>{{ $promotion->promotion_id }}</td>
						<td><b>{{ $promotion->name }}</b></td>
						<td>{{ $promotion->ref }}</td>
						<td>
							<a href="">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</a>
							<a href="">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
							<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection