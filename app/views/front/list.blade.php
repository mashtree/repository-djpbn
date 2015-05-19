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
				<ul>
					
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
						<a href="{{ URL::to('book/'.$value->id) }}"><h5>{{ $titles }}
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
					
					<!--<li >
						<h5>Keliling Indonesia dengan fasilitas kantor ...</h5>
						<div class="result-img">
							<img src="video/Bower.mp4">
						</div>
						<div class="result-content" >
							<span><a>Ahmad Nurholis</a></span>
							<p>Ali Zaki. BAB 6 GOOGLE MAPS DAN WIKIMAPIA Aplikasi yang mirip dengan Google Earth (bahkan sebenarnya memiliki back-office yang sama), namun ditampilkan dengan antarmuka web adalah Google Maps. Karena menggunakan thin ...</p>
						</div>
					</li>
					<li >
						<h5>Keliling Indonesia dengan fasilitas kantor ...</h5>
						<div class="result-img">
							<img src="image/google-logo.png">
						</div>
						<div class="result-content" >
							<span><a>Ahmad Nurholis</a></span>
							<p>Ali Zaki. BAB 6 GOOGLE MAPS DAN WIKIMAPIA Aplikasi yang mirip dengan Google Earth (bahkan sebenarnya memiliki back-office yang sama), namun ditampilkan dengan antarmuka web adalah Google Maps. Karena menggunakan thin ...</p>
						</div>
					</li>
					<li >
						<h5>Keliling Indonesia dengan fasilitas kantor ...</h5>
						<div class="result-img">
							<img src="image/google-logo.png">
						</div>
						<div class="result-content" >
							<span><a>Ahmad Nurholis</a></span>
							<p>Ali Zaki. BAB 6 GOOGLE MAPS DAN WIKIMAPIA Aplikasi yang mirip dengan Google Earth (bahkan sebenarnya memiliki back-office yang sama), namun ditampilkan dengan antarmuka web adalah Google Maps. Karena menggunakan thin ...</p>
						</div>
					</li>
					<li >
						<h5>Keliling Indonesia dengan fasilitas kantor ...</h5>
						<div class="result-img">
							<img src="image/google-logo.png">
						</div>
						<div class="result-content" >
							<span><a>Ahmad Nurholis</a></span>
							<p>Ali Zaki. BAB 6 GOOGLE MAPS DAN WIKIMAPIA Aplikasi yang mirip dengan Google Earth (bahkan sebenarnya memiliki back-office yang sama), namun ditampilkan dengan antarmuka web adalah Google Maps. Karena menggunakan thin ...</p>
						</div>
					</li>-->
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
@stop