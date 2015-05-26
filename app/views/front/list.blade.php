@extends('theme.default')

@section('content')
{{-- kolom pencarian --}}
@include('front.search-bar')
{{-- content --}}
<div class="units-row">
	<div class="large-1 columns">&nbsp;</div>
	<div class="large-10 columns end">
		<div class="units-row"> {{-- jumlah hasil pencarian --}}
		<div class="large-12 columns result-count">Ditemukan {{ count($data)}} katalog dalam kategori ini</div>
		</div>
		<div class="units-row">{{-- hasil pencarian --}}
			<div class="large-8 columns result end">
			@if(count($data)>0)
				<ul id="list">
					
					@foreach($data as $key=>$value)
					<li >
						<?php 
							$titles = explode(' ', $value->title);
							$c = count($titles);
							if($c>10){
								for($i=10;$i<=(count($titles));$i++){
									array_pop($titles);
								}
							}
							$titles = implode(' ', $titles);
						?>
						@if($value->category==5)
							<a href="{{ URL::to('watch/'.$value->id) }}"><h5>{{ $titles }}
						@else
							<a href="{{ URL::to('book/'.$value->id) }}"><h5>{{ $titles }}
						@endif
						@if($c>10)
							...
						@endif
						</h5></a>
						<div class="result-img">
							@if($value->img!=null || $value->img!='')
							<img src="{{ 'http://localhost/repository-djpbn-master/public/image/'.$value->img }}">
							@else
							<img src="http://localhost/repository-djpbn-master/public/image/nopict.jpg">
							@endif
						</div>
						<div class="result-content" >
							<?php $author = AuthorKatalog::get_author_katalog($value->id);?>
							<span>
							@foreach($author as $k=>$v)
								<a href="{{ URL::to('author/'.$v->id)}}">{{ $v->authorname }}</a>,  
							@endforeach
							</span>
							<p>{{ substr($value->summary,0,200).' ...' }}</p>
						</div>
					</li>
					@endforeach
				</ul>
			@else
				<div style="text-align:right">
					<img src="http://localhost/repository-djpbn-master/public/image/empty-box.jpg">
					<h3>ZOONKK...</h3>
					MOHON MAAF ATAS KETIDAKNYAMANNYA ...
				</div>
			@endif
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
$(function(){
	$('#list').dataTable();
});
</script>
@stop