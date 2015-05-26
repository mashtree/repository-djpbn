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
{{ HTML::style('css/foundation.datatables.css'); }}
{{ HTML::script('js/vendor/jquery.js'); }}
{{ HTML::style('css/apps.css'); }}
{{ HTML::script('js/vendor/modernizr.js');}}
</head>
<body>
{{-- top bar --}}
<div id="menu">
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
		<ul class="right">
			@if(Auth::check())
			<li id=""><a href="#">{{Auth::user()->username}}</a></li>
			@endif
	    	<li id=""><a href="{{ URL::to('login') }}">Login</a></li>
	    </ul> 
	    <ul class="left" >
	      	
		    <li id=""><a href="{{ URL::to('list=kajian') }}">Kajian</a>
			
			<li id=""><a href="{{ URL::to('list=jurnal') }}">Jurnal</a></li>
	    	
	    	<li id=""><a href="{{ URL::to('list=artikel') }}">Artikel</a></li>
	    	
	    	<li id=""><a href="{{ URL::to('list=infografis') }}">Infografis</a></li>

	    	<li id=""><a href="{{ URL::to('list=video') }}">Video</a></li>    	
	    	
	    </ul>
	        
	  </section>
	</nav>
</div>
</div>
</div>
{{-- content --}}
<div id="content">
@yield('content')	
</div>
{{-- footer --}}
<div id="footer" class="footer">
	<span>&copy; Bagian Administrasi Kepegawaian 2015</span>
	<span style="float:right;margin-right:20px">Tentang</span>
</div>
{{ HTML::script('js/foundation.min.js'); }}
{{ HTML::script('js/jquery.datatables.js'); }}
{{ HTML::script('js/foundation/foundation.datatables.js'); }}
{{ HTML::script('js/prettify.js'); }}
{{ HTML::script('js/apps.js'); }}
</body>
</html>