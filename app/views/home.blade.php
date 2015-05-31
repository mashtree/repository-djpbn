@extends('theme.default')

@section('content')

<div class="row">
<div class="large-2 columns">&nbsp;</div>
<div class="large-8 columns end">
<div class="logo">
	<img src="image/logo.png">
</div>
<div class="form-search">
	<form>
		<input type="text" id="search" name="keyword" placeholder="type something or keyword with parameter like pengarang:[nama pengarang]">
	</form>
</div>
<div class="tag-line">
	<span>{{$quote['quote']}}</span>
</div>
</div>
</div>
<div class="row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns end">
<hr/>
<h3>Most Viewed</h3>
<ul class="small-block-grid-3">
@foreach($mostviewed as $most)
<li>
<div class="cover">
@if($most->img!=NULL && $most->img!='')
<img src={{URL::to('image/cover/'.$most->img)}}>
@else
<img src={{URL::to('image/nopict.jpg')}}>
@endif
</div>
<span>{{substr($most->title,0,40)}}</span>
</li>
@endforeach
</ul>
</div>
</div>
<div class="row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns end">
<hr/>
<h3>Last Release</h3>
<ul class="small-block-grid-3">
@foreach($lastrelease as $last)
<li>
<div class="cover">
@if($last->img!=NULL && $last->img!='')
<img src={{URL::to('image/cover/'.$most->img)}}>
@else
<img src={{URL::to('image/nopict.jpg')}}>
@endif
</div>
<span>{{substr($most->title,0,40)}}</span>
</li>
@endforeach
</ul>
</div>
</div>

@stop