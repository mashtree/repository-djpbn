<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon" />
	<title>SITIA</title>

	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-theme.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	@include('partials.header')

	<div class="container" role="main">
		@yield('content')
	</div>

	@include('partials.footer')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
	
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').dataTable();
	} );
	
</script>
</body>
</html>