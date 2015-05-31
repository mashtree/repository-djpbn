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
			<li id="">
			@if(Auth::user()->role==3)
			<a href="#">
			@else
			<a href="{{URL::to('admin')}}">
			@endif
			{{ucwords(strtolower(Auth::user()->username))}}</a></li>
			@endif
			@if(Auth::check())
			<li id=""><a href="{{ URL::to('logout') }}">Logout</a></li>
			@else
	    	<li id=""><a href="{{ URL::to('login') }}">Login</a></li>
			@endif
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
<div id="content" style="min-height:600px">
@yield('content')	
</div>
{{-- footer --}}
<div class="units-row">
<div id="footer" class="large-12 columns footer">
	<span>&copy; Bagian Administrasi Kepegawaian 2015</span>
	<span style="float:right;margin-right:20px"><a href="#" data-reveal-id="about">Tentang</a></span>
</div>
</div>
<div style="background-color:#1abc9c" id="about" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	<div style="text-align:center">
		<img width="300px" src="{{URL::to('image/logo.png')}}">
	</div>
	<h2 id="modalTitle" style="color:#fff">About</h2>
	<p  style="color:#fff">Online Library System (OLIS) adalah sebuah laman penyimpanan/repository kajian, artikel, buku, 
	policy paper dan informasi multimedia pada area pembangunan manusia (SDM) Direktorat Jenderal 
	Perbendaharaan, Kementerian Keuangan. OLIS didedikasikan untuk pengembangan riset, inovasi 
	serta pengelolaan pengetahuan SDM Ditjen Perbendaharaan menuju  transformasi peran SDM 
	sebagai mitra strategis dan katalis perubahan organisasi.</p>
	<a class="close-reveal-modal" aria-label="Close"  style="color:#e74c3c">&#215;</a>
</div>
{{ HTML::script('js/foundation.min.js'); }}
{{ HTML::script('js/jquery.datatables.js'); }}
{{ HTML::script('js/foundation/foundation.datatables.js'); }}
{{ HTML::script('js/prettify.js'); }}
{{ HTML::script('js/apps.js'); }}
</body>
</html>