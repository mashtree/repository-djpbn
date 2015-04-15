@extends('default')

@section('content')
{{-- kolom pencarian --}}
@include('search-bar')
{{-- content --}}
<div class="units-row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns end">
	<div class="units-row" style="margin-top:20px">
		<div class="large-5 columns end">
			<h2>4 Musim Cinta</h2>
		</div>
	</div>
	<div class="units-row" >
		<div class="large-9 columns end">
		<embed src="file/angularjs.pdf" style="width:100%;border:1px solid red" height="600" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
		</div>
		<div class="large-3 columns">
			<span>Judul: 4 Musim Cinta</span><br/>
			<span>Penulis: <a href="{{ URL::to('author')}}">Abdul Gafur</a>, <a href="{{ URL::to('author')}}">Pringadi AS</a>, <a href="{{ URL::to('author')}}">Puguh Hermawan</a>, <a href="{{ URL::to('author')}}">Mandewi</a></span><br/>
			<span>Penerbit: Exchange</span><br/>
			<span>Tahun Terbit: Maret 2015</span><br/>
			<span>Jumlah Halaman: 333</span><br/>
			<span>ISBN: 9786027202429</span><br/>
		</div>
	</div>
	
	<div class="units-row">
			<div class="large-8 columns end nav">
				{{--navigasi--}}
			</div>
		</div>
</div>
</div>
@stop