@extends('default')

@section('content')
{{-- kolom pencarian --}}
@include('search-bar')
{{-- content --}}
<div class="units-row">
	<div class="large-1 columns">&nbsp;</div>
	<div class="large-10 columns end">
		<div class="units-row"> {{-- jumlah hasil pencarian --}}
		<div class="large-12 columns result-count">Ditemukan 2.899 katalog dalam kategori ini</div>
		</div>
		<div class="units-row">{{-- hasil pencarian --}}
			<div class="large-8 columns result end">
				<ul>
					<li >
						<a href="{{ URL::to('book') }}"><h5>Keliling Indonesia dengan fasilitas kantor ...</h5></a>
						<div class="result-img">
							<img src="image/4musim.jpg">
						</div>
						<div class="result-content" >
							<span><a href="{{ URL::to('author')}}">Ahmad Nurholis</a></span>
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