<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
			
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				<img src="{{ URL::asset('img/admin/avatars/sunny.png') }}" alt="me" class="online" /> 
				<span>
					Walter.Schweitzer 
				</span>
				<i class="fa fa-angle-down"></i>
			</a> 
			
		</span>
	</div>
	<!-- end user info -->

	<!-- NAVIGATION : This navigation is also responsive

	To make this navigation dynamic please make sure to link the node
	(the reference to the nav > ul) after page load. Or the navigation
	will not initialize.
	-->
	<nav>
		<!-- 
		NOTE: Notice the gaps after each icon usage <i></i>..
		Please note that these links work a bit different than
		traditional href="" links. See documentation for details.
		-->

		<ul>
			<li class="">
				<a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> 
					<span class="menu-item-parent">Dashboard</span></a>
			</li>
			<li class="top-menu-invisible">
				<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> 
					<span class="menu-item-parent">Users</span></a>
				<ul>
					<li class="">
						<a href="{{ route('admin_search_users') }}" title="Dashboard">
							<i class="fa fa-lg fa-fw fa-gear"></i> 
							<span class="menu-item-parent">Search Users</span>
						</a>
					</li>
					<li class="">
						<a href="ajax/skins.html" title="Dashboard">
							<i class="fa fa-lg fa-fw fa-picture-o"></i>
							<span class="menu-item-parent">E-mail Users</span>
						</a>
					</li>
					<li>
						<a href="ajax/difver.html">
							<i class="fa fa-stack-overflow"></i> 
							<span class="menu-item-parent">Users By Service</span>
						</a>
					</li>
					<li>
						<a href="{{ route('user_ban') }}">
							<i class="fa fa-cube"></i> 
							<span class="menu-item-parent">Users Ban List</span>
						</a>
					</li>
					<li>
						<a href="ajax/z.html">
							<i class="fa fa-cube"></i> 
							<span class="menu-item-parent">Extra Email Lists</span>
						</a>
					</li>
					<li>
						<a href="ajax/y.html">
							<span class="menu-item-parent">Timed-Out Members</span>
						</a>
					</li>
					<li>
						<a href="ajax/x.html">
							<span class="menu-item-parent">Conversions</span>
						</a>
					</li>
					<li>
						<a href="ajax/flot.html">
							<span class="menu-item-parent">View Administrators</span>
						</a>
					</li>
					<li>
						<a href="ajax/morris.html">
							<span class="menu-item-parent">Add Administrator</span>
						</a>
					</li>
				</ul>
			</li>
			<!--
			<li>
				<a href="ajax/inbox.html"><i class="fa fa-lg fa-fw fa-inbox"></i> 
					<span class="menu-item-parent">Billing</span> 
				</a>
				<ul>
					<li>
						<a href="ajax/inbox.html">Billing Settings </a>
					</li>
					<li>
						<a href="ajax/inbox-email-view.html">Reconcile Reports </a>
					</li>
				</ul>	
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> 
					<span class="menu-item-parent">Reports</span></a>
				<ul>
					<li>
						<a href="ajax/table.html">Current User Report</a>
					</li>
					<li>
						<a href="ajax/table.html">Revenue Report</a>
					</li>
					<li>
						<a href="ajax/table.html">Trial Conversion Report</a>
					</li>
					<li>
						<a href="ajax/table.html">Billing Change</a>
					</li>
					<li>
						<a href="ajax/table.html">Billed Prior Bill Change</a>
					</li>
					<li>
						<a href="ajax/table.html">Active Billings</a>
					</li>
					<li>
						<a href="ajax/table.html">Free Trials</a>
					</li>
					<li>
						<a href="ajax/table.html">OLD-Change in Billing</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> 
					<span class="menu-item-parent">Periodic E-Mails</span>
				</a>
				<ul>
					<li>
						<a href="ajax/form-elements.html">Nag E-mails</a>
					</li>
					<li>
						<a href="ajax/form-templates.html">Add Nag E-Mail</a>
					</li>
					<li>
						<a href="ajax/validation.html">Billing Notices</a>
					</li>
					<li>
						<a href="ajax/bootstrap-forms.html">Add Billing Notice</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> 
					<span class="menu-item-parent">Products</span></a>
				<ul>
					<li>
						<a href="ajax/general-elements.html">View Products</a>
					</li>
					<li>
						<a href="ajax/general-elements.html">Add Product</a>
					</li>
					<li>
						<a href="ajax/general-elements.html">Order Products</a>
					</li>
					<li>
						<a href="ajax/general-elements.html">Add Category</a>
					</li>
					<li>
						<a href="ajax/general-elements.html">View Categories</a>
					</li>
					<li>
						<a href="ajax/general-elements.html">Sort Categories</a>
					</li>
				</ul>
			</li>	
			<li>
				<a href="ajax/widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i>
					 <span class="menu-item-parent">Sections</span>
				</a>
				<ul>
					<li>
						<a href="ajax/calendar.html">View Sections</a>
					</li>
					<li>
						<a href="ajax/calendar.html">New Section</a>
					</li>
					<li>
						<a href="ajax/calendar.html">View Section Types</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Notify Groups</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Add Notify Group</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Email Notify Groups</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Add Email Notify Groups</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Order Sections</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-cloud"></i> 
					<span class="menu-item-parent">Tags</span>
				</a>
				<ul>
					<li>
						<a href="ajax/calendar.html">View Tags</a>
					</li>
					<li>
						<a href="ajax/calendar.html">New Tag</a>
					</li>
				</ul>
			</li>	
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> 
					<span class="menu-item-parent">Promotions</span>
				</a>
				<ul>
					<li>
						<a href="ajax/calendar.html">Current Promotions</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Historical Promotions</a>
					</li>
					<li>
						<a href="ajax/calendar.html">New Promotions</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Promotions Users</a>
					</li>
					<li>
						<a href="ajax/calendar.html">New Promotion User</a>
					</li>
					<li>
						<a href="ajax/calendar.html">New Co-Reg</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Current Co-Reg</a>
					</li>
					<li>
						<a href="ajax/calendar.html">View Combined Discounts</a>
					</li>
					<li>
						<a href="ajax/calendar.html">Add Combined Discounts</a>
					</li>
				</ul>		
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i>
					 <span class="menu-item-parent">Website Settings</span>
				</a>
			<ul>
				<li>
					<a href="ajax/calendar.html">View All</a>
				</li>
				<li>
					<a href="ajax/calendar.html">View Pages</a>
				</li>
				<li>
					<a href="ajax/calendar.html">View Emails</a>
				</li>
				<li>
					<a href="ajax/calendar.html">View Blocks</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Add Content</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Add Symbols</a>
				</li>
				<li>
					<a href="ajax/calendar.html">List Authors</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Add Author</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Banned Domains</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Ban Domain</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Custom Headers</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Add Header</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Proxy Networks</a>
				</li>
				<li>
					<a href="ajax/calendar.html">Add Network</a>
				</li>
			</ul>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> 
					<span class="menu-item-parent">Constant Contacts</span>
				</a>
				<ul>
					<li>
						<a href="#" >Lists</a>
					</li>
					<li>
						<a href="#" >Refresh Cache</a>
					</li>
					<li>
						<a href="#" >Add List</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> 
					<span class="menu-item-parent">Section Content</span>
				</a>
				<ul>
					<li>
						<a href="#" >ETF Trade Posts</a>
					</li>
					<li>
						<a href="#" >ETF Non-Trade Posts</a>
					</li>
					<li>
						<a href="#" >Mid-Day Minute</a>
					</li>
					<li>
						<a href="#" >Chart Clips</a>
					</li>
					<li>
						<a href="#" >Chart Clips Text</a>
					</li>
					<li>
						<a href="#" >Stocks Non-Trade Posts</a>
					</li>
					<li>
						<a href="#" >Stocks Trade Posts</a>
					</li>
					<li>
						<a href="#" >Mike's Video Upload</a>
					</li>
					<li>
						<a href="#" >NOT USED - Stocks Alerts</a>
					</li>
					<li>
						<a href="#" >Testimonials</a>
					</li>
					<li>
						<a href="#" >Signup Charts</a>
					</li>
					<li>
						<a href="#" >Top Call</a>
					</li>
					<li>
						<a href="#" >Videos</a>
					</li>
				</ul>-->
			</li>
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
</aside>