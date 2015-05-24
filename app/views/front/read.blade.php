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
			<h2>{{ucwords(strtolower($book[0]->title))}}</h2>
		</div>
	</div>
	<div class="units-row" >
		<div id="dcontent" class="large-9 columns">
		<embed src="http://localhost/repository-djpbn-master/public/file/{{$book[0]->file}}" style="width:100%;border:1px solid red" height="600" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
		</div>
		<div id="dinfo" class="large-3 columns">
			<span class="close" id="info">X</span>
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
		</div>
	</div>
	
	<div class="units-row">
			<div class="large-8 columns end nav">
				{{--navigasi--}}
			</div>
		</div>
</div>
</div>
<script>
$('#info').click(function(e){
	$('#dinfo').hide();
	$('#dcontent').removeClass('large-9 columns').addClass('large-12 columns');
})
</script>
@stop