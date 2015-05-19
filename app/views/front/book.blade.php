@extends('theme.default')

@section('content')
{{-- kolom pencarian --}}
@include('front.search-bar')
{{-- content --}}
<div class="units-row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns end">
	<div class="row" style="margin-top:20px">
		<div class="large-12 columns end">
			<h2>{{ucwords(strtolower($book[0]->title))}}</h2>
		</div>
	</div>
	<div class="row" >
		<div class="large-5 columns end">
		@if($book[0]->img!=null || $book[0]->img!='')
		<img src="{{ 'http://localhost/repository-djpbn-master/public/image/'.$book[0]->img }}">
		@else
		<img src="http://localhost/repository-djpbn-master/public/image/nopict.jpg">
		@endif
		</div>
		<div class="large-7 columns">
			<span>Judul: <b>{{ucwords(strtolower($book[0]->title))}}</b></span><br/>
			<span>Penulis: 
			@foreach($authors as $author)
				<a href="{{ URL::to('author/'.$author->id)}}">{{$author->authorname}}</a>, 
			@endforeach
			</span><br/>
			<span>Penerbit: {{$book[0]->publishername}}</span><br/>
			<span>Tahun Terbit: {{$book[0]->release}}</span><br/>
			<span>Jumlah Halaman: {{$book[0]->numpage}}</span><br/>
			<span>ISBN: {{$book[0]->ISBN}}</span><br/>

			<h5>Blurb:</h5>

			<p style="text-align:justify">{{$book[0]->summary}}</p>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<a href="{{URL::to('summary/'.$book[0]->id)}}">pratinjau</a> | <a href="{{URL::to('read/'.$book[0]->id)}}">baca</a>
		</div>
	</div>
	<div class="row">
		<div class="large-5 columns end">
		<h4>Kata Siapa?</h4>
		<hr/>
			<ul>
				<li style="display:block;margin-left:-15px;">
					<b>Marwanto</b>
					<p><i>"Luar biasa!"</i></p>
				</li>
				<li style="display:block;margin-left:-15px">
					<b>Muhammad Arif</b>
					<p><i>"Siapa dulu dong gurunya :D!"</i></p>
				</li>
			</ul>
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