<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  	<meta name="description" content="BarberTop Booking Salon">

  		<title><?php echo $pageTitle ?></title>

  		<!-- FONTS FILE -->
  		<link rel="stylesheet" href="Design/fonts/css/all.min.css" type="text/css">

  		<!-- Nunito FONT FAMILY FILE -->
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- CSS FILES -->
  		<link href="Design/css/admin.css" rel="stylesheet">
  		<link href="Design/css/main.css" rel="stylesheet">

  		<!-- Barber Icons -->
  		<link rel="stylesheet" type="text/css" href="Design/fonts/css/all.min.css">
  		<link rel="stylesheet" type="text/css" href="Design/css/barber-icons.css">

	</head>

	<body id="page-top">

  		<!-- Page Wrapper -->
  		<div id="wrapper">
		
			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		  		<!-- Sidebar - Brand -->
		  		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
					<div class="sidebar-brand-icon rotate-n-15">
			  			<i class="bs bs-scissors-1"></i>
					</div>
					<div class="sidebar-brand-text mx-3">BarberTop</div>
		  		</a>

		  		<!-- Divider -->
		  		<hr class="sidebar-divider my-0">

			  	<!-- Nav Item - Dashboard -->
			  	<li class="nav-item active">
					<a class="nav-link" href="index.php">
				  		<i class="fas fa-fw fa-tachometer-alt"></i>
				  		<span>Barber Dashboard</span>
				  	</a>
			  	</li>

	  			<!-- Divider -->
	  			<hr class="sidebar-divider">

	  			<!-- Heading -->
	  			<div class="sidebar-heading">
					SERVICES & CATEGORIES
	  			</div>

	  			<!-- Nav Item - Pages Collapse Menu -->
	  			<li class="nav-item">
					<a class="nav-link" href="service-categories.php">
		  				<i class="fas fa-list"></i>
		  				<span>Service Categories</span>
		  			</a>
	  			</li>
	  			<li class="nav-item">
					<a class="nav-link" href="services.php">
		  				<i class="bs bs-scissors-1"></i>
		  				<span>Services</span>
		  			</a>
	  			</li>
	  			<!-- <li class="nav-item">
					<a class="nav-link" href="#">
		  				<i class="far fa-image"></i>
		  				<span>Samples</span>
		  			</a>
	  			</li> -->
			  	

	  			<!-- Divider -->
	  			<hr class="sidebar-divider">

	  			<!-- Heading -->
	  			<div class="sidebar-heading">
					CLIENTS & STAFF
	  			</div>

	  			<!-- Nav Item - Charts -->
	  			<li class="nav-item">
					<a class="nav-link" href="clients.php">
		  				<i class="far fa-address-card"></i>
		  				<span>Clients</span>
		  			</a>
	  			</li>
	  			<!-- <li class="nav-item">
					<a class="nav-link" href="employees.php">
		  				<i class="far fa-user"></i>
		  				<span>Employees</span>
		  			</a>
	  			</li> -->
	  			<li class="nav-item">
					<a class="nav-link" href="employees-schedule.php">
		  				<i class="fas fa-calendar-week icon-ver"></i>
		  				<span>Employee Schedule</span>
		  			</a>
	  			</li>
	  
	  			<!-- Divider -->
	  			<hr class="sidebar-divider d-none d-md-block">

	  			<!-- Sidebar Toggler (Sidebar) -->
	  			<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
	  			</div>
			</ul>
			
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
			  
			  	<!-- Main Content -->
			  	<div id="content">
					
					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					  
					 	<!-- Sidebar Toggle (Topbar) -->
					  	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
					  	</button>

					  	<!-- Topbar Navbar -->
					  	<ul class="navbar-nav ml-auto">
							<li class="nav-item">
		              			<a class="nav-link" href="../" target="_blank">
		              				<i class="far fa-eye"></i>
		                			<span class="viewebsite" style="margin-left: 5px;">View website</span>
		              			</a>
		          			</li>
							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
					  			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-sm-inline text-gray-600 small">
										<?php echo $_SESSION['email_barbertop']; ?>
									</span>
									<i class="fas fa-caret-down"></i>
								</a>
							  	
							  	<!-- Dropdown - User Information -->
							  	<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="./barber-profile.php">
								  		<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								  		Profile
									</a>
									<!-- <a class="dropdown-item" href="#">
								  		<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
								  		Settings
									</a> -->
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								  		<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								  		Logout
									</a>
							  	</div>
							</li>
				  		</ul>
					</nav>
					<!-- End of Topbar -->

	