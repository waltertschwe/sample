<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{!! csrf_token() !!}">

		<title>AdviceTrade Admin -  @yield('title')</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- CUSTOM CSS GOES HERE -->
		<link href="{{ asset('css/admin/your_style.css') }}" rel="stylesheet">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script src="https://use.fontawesome.com/3f7c27daca.js"></script>
		<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" class="init">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
	</head>
	<body>

			@include('admin.partials.nav-top')
			<!-- TWO COLUMN LAYOUT -->
			<div class="container-fluid">
				<div class="row">
					<!-- LEFT NAVIGATION -->
					<div class="col-sm-3 col-md-3 sidebar">
						@include('admin.partials.nav-bar-left')
					</div>
					<!-- MAIN ADMIN CONTENT -->
					<div class="col-sm-9 col-sm-offset-3 col-md-9 main">
						<!-- TODO: MOVE FLASH MESSAGES TO THEIR OWN INCLUDE -->
						@if(Session::has('success'))
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>{{ Session::get('success') }}</strong>
							</div>
						@endif
						@if(Session::has('danger'))
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>{{ Session::get('danger') }}</strong>
							</div>
						@endif
						<div id="flash-success"></div>
						@yield('content')
					</div>
				</div>
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3 col-md-8 main">
					@include('admin.partials.footer')
					</div>
				</div>

			</div>
	</body>
</html>
