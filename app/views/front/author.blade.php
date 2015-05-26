@extends('theme.default')

@section('content')

{{-- kolom pencarian --}}
@include('front.search-bar')
{{-- content --}}
<div class="units-row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-8 columns end">
<div class="row">
<div class="large-12 columns" style="margin-top:20px">
<h4>{{$author->authorname}}&nbsp;<span style="font-size:0.5em"><a href="{{URL::to('lsauthor')}}">[list author]</a></span></h4>
</div>
</div>
<div class="row">
<div class="large-3 columns">
	@if($author->foto!=null || $author->foto!='')
	<img src="{{ 'http://localhost/repository-djpbn-master/public/image/'.$author->foto }}" style="width:100%">
	@else
	<img src="http://localhost/repository-djpbn-master/public/image/nopicture.jpg" style="width:100%">
	@endif
</div>
<div class="large-8 columns end">
	<span>{{$author->nip}}</span><br/>
	<span>{{$author->birthplace}}, {{$author->birthdate}} </span><br/>
	<span>{{$author->office}}</span>
</div>
</div>
<div class="row">
<div class="large-12 columns">
	<h5>Sepatah kata</h5>
	<p style="text-align:justify">{{$author->about}}</p>
</div>
</div>
<div class="row">
<div class="large-12 columns">
	<h5>Karya :</h5>
	<ol>
	@foreach($books as $book)
		<li>
		@if($book->category==5)
		<a href="http://localhost/repository-djpbn-master/public/watch/{{$book->id}}">
		@else
		<a href="http://localhost/repository-djpbn-master/public/book/{{$book->id}}">
		@endif
		{{ucwords(strtolower($book->title))}}</a> ({{$book->release}})</li>
	@endforeach
	</ol>
</div>
</div>
<div class="row">
<div class="large-12 columns">
	<h5>Kata siapa?</h5>
	<ul>
	<li style="display:block;margin-left:-15px">
	@foreach($comment as $key => $value)
		<li style="display:block;margin-left:-15px;">
			<b>{{$value->name}}</b>
			<p><i>"{{$value->comment}}"</i></p>
		</li>
	@endforeach
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