<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Triyono - mashtree@gmail.com">

<title>{{$title or '.:Repository DJPBN:.'}}</title>

{{ HTML::style('css/prettify.css'); }}
{{ HTML::style('css/foundation.css');}}
{{ HTML::style('css/foundation-icons.css');}}
{{ HTML::style('css/foundation.datepicker.css');}}

{{ HTML::style('css/admin.css'); }}
{{ HTML::script('js/vendor/modernizr.js');}}
{{ HTML::script('js/vendor/jquery.js'); }}
{{ HTML::script('js/foundation/foundation.datepicker.js'); }}
</head>
<body>
{{-- top bar --}}
<div id="top-bar">
<div class="units-row" style="margin:0 -15px 0 -15px">
<div class="large-12 columns navigation-area">
	<nav class='top-bar' data-topbar>
	<ul class="title-area">
	    <li class="name">
		
	      
	    </li>
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
	    </li>
	</ul>
	<section class="top-bar-section">
	    <ul class="right" >

	    	<li id=""><a href="#">Username</a></li>

	    	<li id=""><a href="#">Logout</a></li>    	
	    	
	    </ul>    
	  </section>
	</nav>
</div>
</div>
</div>
<div class="units-row">
{{-- side-menu --}}
<div class="large-3 columns">
<div id="side-menu">
@include('admin.side-menu')
</div>
</div>
{{-- content --}}
<div class="large-9 columns">
<div id="content">
@yield('content')	
</div>
</div>
</div>
{{-- footer --}}
<div id="footer" class="footer">
	&copy; Bagian Administrasi Kepegawaian 2015
</div>
{{ HTML::script('js/foundation.min.js'); }}
{{ HTML::script('js/foundation/foundation.magellan.js'); }}
{{ HTML::script('js/foundation/foundation.reveal.js'); }}
{{ HTML::script('js/prettify.js'); }}
{{ HTML::script('js/apps.js'); }}
</body>
</html>