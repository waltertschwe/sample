@extends('admin.layouts.admin')

@section('title', 'Product Billing Plans')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Product Billing Plan Actions</div>
	<div class="panel-body">
	<a href="{{ route('product_show', ['product_id' => $product->product_id]) }}" 
		class="btn btn-default">
		<i class="fa fa-edit" aria-hidden="true"></i> Edit Product
	</a>
	<span class="button-spacer"></span>
	<a href="/suspend/1" class="btn btn-default">
		<i class="fa fa-wrench" aria-hidden="true"></i> Update Content
	</a>
	<span class="button-spacer"></span>
	<a href="{{ route('billing_create', ['product_id' => $product->product_id]) }}" 
		class="btn btn-default">
		<i class="fa fa-money" aria-hidden="true"></i> Add A Billing Plan
	</a>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">"{{ $product->name }}" - Billing Plans</h3>
	</div>
		<div class="panel-body">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Plan Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($plans as $plan)
					<tr>
						<td><b>{{ $plan->name }}</b></td>
						<td>
							<a href={{ route('billing_show', ['billing_plan_id' => $plan->billing_plan_id]) }}
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</a>
							<a href="">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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