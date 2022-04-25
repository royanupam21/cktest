<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>DEMO MIS - @yield('title')</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets/assets/css/css/font-awesome.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('assets/assets/css/feathericon.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/assets/css/style.css')}}">
        <link href="{{asset('assets/libs/js/select2/dist/css/select2.min.css')}}" rel="stylesheet">


        <!-- calender -->
        <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />

		<!-- If you use the default popups, use this. -->
		<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />
		<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
		<link href="{{asset('assets/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet">

		<link id="tempSkin" rel="stylesheet" href="{{asset('assets/assets/css/style-teal.css')}}">

		<link rel="stylesheet" href="{{asset('assets/jQueryUI/jquery-ui-latest.css')}}"> 

		<!-- calender -->
		<script src="{{asset('assets/assets/js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets/jQueryUI/jquery-ui-latest.js')}}"></script>
		<script src="https://use.fontawesome.com/9d85a18f89.js"></script>

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left" style="    padding-top: 12px;">
                    <a href="#" class="logo">
						<!-- <img src="{{asset('assets/assets/img/logo.png')}}" alt="Logo"> -->
						<h3 style="color: #fff;">DEMO MIS</h3>
					</a>
					<a href="index.html" class="logo logo-small">
						<img src="{{asset('assets/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<!-- <div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div> -->
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- App Lists -->
					<li class="nav-item dropdown app-dropdown">
						<a class="nav-link dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#"><i class="fe fe-app-menu"></i></a>
						<ul class="dropdown-menu app-dropdown-menu">
							<li>
								<div class="app-list">
									<div class="row">
										<div class="col"><a class="app-item" href="inbox.html"><i class="fa fa-envelope"></i><span>New Order</span></a></div>
										<!-- <div class="col"><a class="app-item" href="calendar.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></div> -->
										<div class="col"><a class="app-item" href="chat.html"><i class="fa fa-users"></i><span>Users</span></a></div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<!-- /App Lists -->
					
					
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{ (isset(Auth::user()->photo))? asset('public/uploads/user/').'/'.Auth::user()->photo:asset('assets\images\avtr.png')}}" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{ (isset(Auth::user()->photo))? asset('public/uploads/user').'/'.Auth::user()->photo:asset('assets\images\avtr.png')}}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>Hello {{Auth::user()->first_name}}!</h6>
									<p class="text-muted mb-0">{{Auth::user()->email}}</p>
								</div>
							</div>
							
							<a class="dropdown-item" href="{{url('/admin/manage-profile/')}}/{{Auth::user()->id}}">Profile</a>
							<a class="dropdown-item" href="{{url('logout')}}">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
			@yield('content')
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('assets/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{asset('assets/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/libs/js/select2/dist/js/select2.min.js')}}"></script> 
		<script src="{{asset('assets/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script> 
		
	<script>
		/*

		https://github.com/kamranahmedse/jquery-toast-plugin

		$.toast({ 
	  text : "Let's test some HTML stuff... <a href='#'>github</a>", 
	  showHideTransition : 'slide',  // It can be plain, fade or slide
	  bgColor : 'blue',              // Background color for toast
	  textColor : '#eee',            // text color
	  allowToastClose : false,       // Show the close button or not
	  hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
	  stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
	  textAlign : 'left',            // Alignment of text i.e. left, right, center
	  position : 'bottom-left'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
	})
		*/

	</script>

		<!-- Custom JS -->
		 <script src="{{asset('assets/assets/js/script.js')}}"></script> 
		  @yield('scripts')
	</body>
</html>