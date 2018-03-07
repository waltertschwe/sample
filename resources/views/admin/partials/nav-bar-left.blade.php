<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-3">
		<div class="panel-group" id="accordion">
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<!-- START USERS SIDE BAR NAV -->
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
		<span class="glyphicon glyphicon-user">
		</span>Users</a>
		</h4>
		</div>
		<!-- Add "in" class to default an open panel. ex. panel-collapse collapse in -->
		<div id="collapseOne" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table">
		<tr>
		<td class="table-no-border">
		<span class="glyphicon glyphicon-pencil text-primary"></span>
		<a href="{{ route('user_index', ['website_id' => $website->website_id]) }}">
		View Users
		</a>
		</td>
		</tr>
		<tr>
		<td>
		<span class="glyphicon glyphicon-file text-info"></span>
		<a href="">Users By Service</a>
		</td>
		</tr>
		<tr>
		<td>
		<span class="glyphicon glyphicon-comment text-success"></span>
		<a href="">User Ban List</a>
		<span class="badge">2</span>
		</td>
		</tr>
		</table>
		</div>
		</div>
		</div>
		<!-- START BILLING SIDE BAR NAV -->
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			<span class="glyphicon glyphicon-folder-close">
		</span>Billing</a>
		</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table">
		<tr>
		<td>
		<a href="">Billing Settings</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="">Reconcile Reports</a>
		</td>
		</tr>
		</table>
		</div>
		</div>
		</div>
		<!-- START ADMINISTRATORS SIDE BAR NAV -->
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
			<span class="glyphicon glyphicon-folder-close">
		</span>Administrators</a>
		</h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table">
		<tr>
		<td>
		<a href="{{ route('admin_index', ['website_id' => $website->website_id]) }}">View Administrators</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('admin_create', ['website_id' => $website->website_id]) }}">Add Administrators</a>
		</td>
		</tr>
		</table>
		</div>
		</div>
		</div>
		<!-- START PRODUCTS LEFT NAV -->
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><span class="glyphicon glyphicon-th">
		</span>Products</a>
		</h4>
		</div>
		<div id="collapseSix" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table">
		<tr>
			<td>
				<a href="{{ route('product_index', ['website_id' => $website->website_id]) }}">View Products</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="{{ route('product_create', ['website_id' => $website->website_id]) }}">Add Product</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="{{ route('product_order', ['website_id' => $website->website_id]) }}">Order Products</a> 
			</td>
		</tr>
		</table>
		</div>
		</div>
		</div>
		
		<!-- START SECTIONS SIDE BAR NAV -->
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
			<span class="glyphicon glyphicon-folder-close">
		</span>Sections</a>
		</h4>
		</div>
		<div id="collapseSeven" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table">
		<tr>
		<td>
		<a href="{{ route('section_index', ['website_id' => $website->website_id]) }}">View Sections</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('section_create', ['website_id' => $website->website_id]) }}">New Section</a> 
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('section_type_index', ['website_id' => $website->website_id]) }}">View Section Types</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('notification_group_index', ['website_id' => $website->website_id]) }}">Notify Groups</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('notification_group_create', ['website_id' => $website->website_id]) }}">Add Notify Groups</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('email_notification_group_index', ['website_id' => $website->website_id]) }}">Email Notify Groups</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('email_notification_group_create', ['website_id' => $website->website_id]) }}">Add Email Notify Group</a>
		</td>
		</tr>
		<tr>
			<td>
				<a href="{{ route('section_order', ['website_id' => $website->website_id]) }}">Order Sections</a> 
			</td>
		</tr>
		<!--
		<tr>
		<td>
		<span class="glyphicon glyphicon-trash text-danger"></span>
		<a href="http://www.jquery2dotnet.com" class="text-danger">
		Delete Account</a>
		</td>
		</tr>-->
		</table>
		</div>
		</div>
		</div>
		<!-- START PROMOTIONS SIDE BAR NAV -->
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
			<span class="glyphicon glyphicon-folder-close">
		</span>Promotions</a>
		</h4>
		</div>
		<div id="collapseEight" class="panel-collapse collapse">
		<div class="panel-body">
		<table class="table">
		<tr>
		<td>
		<a href="{{ route('promotions_current', ['website_id' => $website->website_id]) }}">Current Promotions</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('promotions_historical', ['website_id' => $website->website_id]) }}">Historical Promotions</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="{{ route('promotion_create', ['website_id' => $website->website_id]) }}">New Promotion</a>
		</td>
		</tr>
		</table>
		</div>
		</div>
		</div>
		<!-- START REPORTS SIDE BAR NAV -->
		<div class="panel panel-default">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
			<span class="glyphicon glyphicon-file">
		</span>Reports</a>
		</h4>
		</div>
		<div id="collapseNine" class="panel-collapse collapse">
		<div class="panel-body">
		<!--
		<table class="table">
		<tr>
		<td>
		<span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>
		</td>
		</tr>
		<tr>
		<td>
		<span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Customers</a>
		</td>
		</tr>
		<tr>
		<td>
		<span class="glyphicon glyphicon-tasks"></span><a href="http://www.jquery2dotnet.com">Products</a>
		</td>
		</tr>
		<tr>
		<td>
		<span class="glyphicon glyphicon-shopping-cart"></span><a href="http://www.jquery2dotnet.com">Shopping Cart</a>
		</td>
		</tr>
		</table>-->
		</div>
		</div>
		</div>
		</div>
		</div>
	</div>
</div>
