<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from ventura.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Nov 2020 08:58:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>{{ 'DEMO MIS System!' }} - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/assets/css/font-awesome.min.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
		
		<!--[if lt IE 9]>
			<script src="public/assets/js/html5shiv.min.js"></script>
			<script src="public/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left" style="color: #fff;">
							<!-- <img class="img-fluid" src="public/assets/img/logo.png" alt="Logo"> -->
							{{ 'DEMO MIS System!' }}
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to dashboard</p>
								@yield('content')
								
								
								<div class="login-or">
									<span class="or-line"></span>
									<!-- <span class="span-or">or</span> -->
								</div>
								<!-- <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div> -->
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('assets/assets/js/jquery-3.2.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/assets/js/bootstrap.min.js') }}"></script>
		<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
		<!-- Custom JS -->
		<!-- <script src="{{ asset('assets/assets/js/script.js') }}"></script> -->
		<script>
    $(document).ready(function(){
        $( "#dob" ).datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,
      changeYear: true });
    });
    </script>
    </body>

<!-- Mirrored from ventura.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Nov 2020 08:58:07 GMT -->
</html>