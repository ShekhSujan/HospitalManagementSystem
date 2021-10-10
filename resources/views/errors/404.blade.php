<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Le Rouge Admin Template - 404</title>


		<!-- Font for coming soon page -->
		<link href="https://fonts.googleapis.com/css?family=Erica+One&display=swap" rel="stylesheet">

		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset("assets/backend/css/bootstrap.min.css")}}">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{asset("assets/backend/fonts/style.css")}}">
		<!-- Main css -->
		<link rel="stylesheet" href="{{asset("assets/backend/css/main.css")}}">

		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- Particles CSS -->
		<link rel="stylesheet" href="{{asset("assets/backend/vendor/particles/particles.css")}}">

	</head>

	<body class="authentication">

		<div id="particles-js"></div>
		<div class="countdown-bg"></div>

		<div class="error-screen">
			<h1>404</h1>
			<h5>We're sorry!<br/>The page you have requested cannot be found.</h5>
			<a href="{{route("dashboard")}}" class="btn btn-primary">Go back to Dashboard</a>
		</div>

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{asset("assets/backend/js/jquery.min.js")}}"></script>
		<script src="{{asset("assets/backend/js/bootstrap.bundle.min.js")}}"></script>
		<script src="{{asset("assets/backend/js/moment.js")}}"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Particles JS -->
		<script src="{{asset("assets/backend/vendor/particles/particles.min.js")}}"></script>
		<script src="{{asset("assets/backend/vendor/particles/particles-custom-error.js")}}"></script>

	</body>
</html>
