@extends('admin.layouts.admin')

@section('title', 'Products')

@section('content')
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Products</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Product ID</th>
						<th>Name</th>
						<th>Room Name</th>
						<th>Is Active</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>{{ $product->product_id }}</td>
						<td><b>{{ $product->name }}</b></td>
						<td>{{ $product->room_name }}</td>
						<td>{{ $product->is_active ? 'True' : 'False' }}</td>
						<td>
							<a href={{ route('product_show', ['product_id' => $product->product_id]) }}
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</a>
							<a href={{ route('product_delete', ['product_id' => $product->product_id]) }}
							onclick="return confirm('Are you sure you want to delete {{ $product->name}} ');"
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
							<a href={{ route('billing_index', ['product_id' => $product->product_id]) }}
								<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
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