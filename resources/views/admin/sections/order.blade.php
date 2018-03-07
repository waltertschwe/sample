@extends('admin.layouts.admin')

@section('title', 'Order Sections')

@section('content') 

<script>
	$( function() {
		$( "#section-list" ).sortable({
			revert: true,
			update: function (event, ui) {
				var order = []; 
				$('#section-list li').each( function(e) {
					order.push( $(this).attr('id') );
				});
				

				$.ajax({
					cache: false,
					method: "PUT", 
					url: "{{ route('admin_ajax_section_order') }}",
					data: {
						'websiteId' : {{ $website->website_id }},
						'order': order,
						'_token': $('meta[name="csrf-token"]').attr('content')
					},
					success: function(response) { 
						var e = $('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Section Order Updated!</strong></div>');
						$('#flash-success').append(e); 
						e.attr('id', 'success');
						e.fadeOut(2000);
						console.log(response); 
					},
					error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
						console.log("error");
					}
				});
			}
		});
		
		$( "#draggable" ).draggable({
			connectToSortable: "#product-list",
			helper: "clone",
			revert: "invalid"
		});
		
		$( "ul, li" ).disableSelection();
	} );

	
</script>
<style>
	ul.section-list { list-style-type: none; margin: 0; padding: 0; margin-bottom: 10px; }
	li.section-item { margin: 5px; padding: 5px; width: 500px; }
</style>

<div class="well">
	<center><b>Drag and drop the Sections to order them</b></center>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Order Sections</h3>
	</div>
	<div class="panel-body">
		<div class="col-md-12 col-sm-12">
			<ul class="section-list" id="section-list">
				@foreach ($sections as $section)
					<li id="{{ $section->section_id }}" class="ui-state-default section-item">
						<i class="fa fa-sort" aria-hidden="true" style="margin-left:15px;"></i>
						<span style="margin-left:15px;"></span>
						{{ $section->name }}
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection