<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Queue Tracking Management System</title>
	<link rel="icon" href="{{ asset('icon.png') }}">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
	

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">


	
	<!-- animate CSS
        ============================================ -->
		<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/modals.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body  style="min-height:90vh;">
    <!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top" style="background-color: rgb(0,0,0);">
			<div class="brand" style="background-color: rgb(0,0,0);">
				<h3 style="margin-top: -10px;margin-bottom: -25px;font-weight: 900;font-family: Tahoma;color: rgb(218, 215, 212);">Queue Tracking Management System</h3>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span style="color:#fff;">Admin</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="home/profile"><i class="fa fa-user"></i> <span>My Profile</span></a></li>
								<li>
                                    <a href="{{ route('logout') }}"
                                    class="fa fa-sign-out"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar" style="background-color: rgb(0,0,0) !important;">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{ route('employees') }}" class="{{ Request::is('employees') ? 'active' : '' }}"><i class="fa fa-users"></i> <span>Employee</span></a></li>
						<li><a href="{{ route('empStats') }}" class="{{ Request::is('empStats') ? 'active' : '' }}"><i class="fa fa-info"></i> <span>Employee Stats</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

		@yield('content')
							
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	
</body>
	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>

</html>

