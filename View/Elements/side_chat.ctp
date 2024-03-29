<!-- Sidebar starts -->
<div class="sidebar">
	<!-- Logo starts -->
	<div class="logo">
		<h1><a href="index.html">Sheldon</a></h1>
	</div>
	<!-- Logo ends -->

	<!-- Sidebar buttons starts -->
	<div class="sidebar-buttons text-center">
		<!-- User button -->
		<div class="btn-group">
			<a href="profile.html" class="btn btn-black btn-xs"><i class="fa fa-user"></i></a>
			<a href="profile.html" class="btn btn-danger btn-xs">User</a>
		</div>
		<!-- Lock button -->
		<div class="btn-group">
			<a href="lock.html" class="btn btn-black btn-xs"><i class="fa fa-lock"></i></a>
			<a href="lock.html" class="btn btn-danger btn-xs">Lock</a>
		</div>
		<!-- Logout button -->
		<div class="btn-group">
			<a href="login.html" class="btn btn-black btn-xs"><i class="fa fa-power-off"></i></a>
			<a href="login.html" class="btn btn-danger btn-xs">Logout</a>
		</div>
	</div>
	<!-- Sidebar buttons ends -->

	<!-- Sidebar search -->
	<div class="sidebar-search">
		<form class="form-inline" role="form">
			<div class="input-group">
				<input type="text" class="form-control" id="s" placeholder="Type Here to Search...">
				<!-- Search button -->
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                              </span>
			</div>
		</form>
	</div>
	<!-- Sidebar search -->

	<!-- Sidebar navigation starts -->

	<div class="sidebar-dropdown"><a href="#">Navigation</a></div>

	<div class="sidey">
		<ul class="nav">
			<!-- Main navigation. Refer Notes.txt files for reference. -->

			<!-- Use the class "current" in main menu to hightlight current main menu -->
			<li><a href="index.html"><i class="fa fa-desktop"></i> Dashboard</a></li>
			<li><a href="tables.html"><i class="fa fa-user"></i> Candidates</a></li>
			<li><a href="form.html"><i class="fa fa-list-alt"></i> Jobs</a></li>
			<li><a href="users.html"><i class="fa fa-comments"></i> Chats</a></li>
			<li><a href="extensions.html"><i class="fa fa-cog"></i> Setting</a></li>


			<li class="has_submenu">
				<a href="#">
					<i class="fa fa-bug"></i> Extras <span class="label label-darky">3</span>
					<span class="caret pull-right"></span>
				</a>
				<ul>
					<li><a href="0-base.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
					<li><a href="404.html"><i class="fa fa-angle-double-right"></i> 404</a></li>
					<li><a href="lock.html"><i class="fa fa-angle-double-right"></i> Lock</a></li>
				</ul>
			</li>

		</ul>
	</div>
	<!-- Sidebar navigation ends -->

	<!-- Sidebar chart starts -->
	<div class="sidebar-chart hidden-xs">
		<!-- Buttons -->
		<div class="sidebar-chart-info"><i class="fa fa-angle-up btn btn-success btn-xs"></i> <i class="fa fa-angle-down btn btn-info btn-xs"></i></div>
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-5">
				<!-- Sparkline chart -->
				<div id="side-chart"></div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-7">
				<!-- Content -->
				<h5>Great Profit!</h5>
				<p>4,500 New users joined the site 20.</p>
			</div>
		</div>
	</div>
	<!-- Sidebar chart ends -->

	<!-- Sidebar weather starts -->
	<div class="sidebar-weather hidden-xs">
		<div class="sidebar-weather-header">
			<!-- Title -->
			<h6>New York, Weather</h6>
		</div>
		<div class="sweather-left">
			<!-- Cloud icon -->
			<i class="fa fa-cloud"></i>
		</div>
		<div class="sweather-right">
			<!-- Weather -->
			<span class="sweather-big">28&deg;C</span><br />
		</div>
		<div class="clearfix"></div>
		<!-- Footer -->
		<div class="sidebar-weather-footer">
			<p>Wind : 55 KM/hr - Humidity : 55%</p>
		</div>
	</div>
	<!-- Sidebar weather ends -->

	<!-- Sidebar status starts -->
	<div class="sidebar-status hidden-xs">

		<!-- Status item -->
		<div class="sidebar-status-item">
			<!-- Title -->
			<div class="sidebar-status-title">Disk Space <span class="pull-right">20.00 GB / 50.00 GB</span></div>
			<!-- Progress bar -->
			<div class="progress progress-striped">
				<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
				</div>
			</div>
		</div>

		<!-- Status item -->
		<div class="sidebar-status-item">
			<!-- Title -->
			<div class="sidebar-status-title">Users <span class="pull-right">5000 / 800000</span></div>
			<!-- Progress bar -->
			<div class="progress progress-striped">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
				</div>
			</div>
		</div>

		<!-- Status item -->
		<div class="sidebar-status-item">
			<!-- Title -->
			<div class="sidebar-status-title">Income <span class="pull-right">$25,000 / $50,000</span></div>
			<!-- Progress bar -->
			<div class="progress progress-striped">
				<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
				</div>
			</div>
		</div>

	</div>
	<!-- Sidebar status ends -->

</div>
<!-- Sidebar ends -->
