@extends('theme.default')

@section('content')
{{-- kolom pencarian --}}
@include('front.search-bar')
{{-- content --}}
<div class="units-row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns end">
	<div class="units-row" style="margin-top:20px">
		<div class="large-12 columns end">
			<h2>{{ucwords(strtolower($video[0]->title))}}</h2>
		</div>
	</div>
	<div class="units-row" >
		<div class="large-9 columns end">
		@if(!file_exists('video/'.$video[0]->file))
		<iframe width="100%" height="400px" src="{{$video[0]->file}}" frameborder="0" allowfullscreen></iframe>
		@else
		<video style="width:100%" controls>
		  <source src="http://localhost/repository-djpbn/public/video/{{$video[0]->file}}" type="video/mp4">
		  Your browser does not support HTML5 video.
		</video>
		@endif
		</div>
		<div class="large-3 columns">
			<span>Judul: <b>{{ucwords(strtolower($video[0]->title))}}</b></span><br/>
			<span>Penulis: 
			@foreach($authors as $author)
			<a href="{{ URL::to('author/'.$author->id)}}">{{$author->authorname}}</a>, 
			@endforeach
			</span><br/>
			<span>Penerbit: {{$video[0]->publishername}}</span><br/>
			<span>Tahun Terbit: {{$video[0]->release}}</span><br/>
			<span>Durasi: {{$video[0]->numpage}} menit</span><br/>
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