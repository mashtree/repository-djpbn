@extends('theme.default')

@section('content')
{{-- kolom pencarian --}}
@include('front.search-bar')
{{-- content --}}
<div class="units-row">
<div class="large-1 columns">&nbsp;</div>
<div class="large-10 columns end">
	<div class="row" style="margin-top:20px">
		<div class="large-5 columns end">
			<h2>4 Musim Cinta</h2>
		</div>
	</div>
	<div class="row" >
		<div class="large-5 columns end">
		<img src="image/4musim.jpg">
		</div>
		<div class="large-7 columns">
			<span>Judul: 4 Musim Cinta</span><br/>
			<span>Penulis: <a href="{{ URL::to('author')}}">Abdul Gafur</a>, <a href="{{ URL::to('author')}}">Pringadi AS</a>, <a href="{{ URL::to('author')}}">Puguh Hermawan</a>, <a href="{{ URL::to('author')}}">Mandewi</a></span><br/>
			<span>Penerbit: Exchange</span><br/>
			<span>Tahun Terbit: Maret 2015</span><br/>
			<span>Jumlah Halaman: 333</span><br/>
			<span>ISBN: 9786027202429</span><br/>

			<h5>Blurb:</h5>

			<p style="text-align:justify">Apa kau percaya jika satu hati hanya diciptakan untuk satu cinta? Barangkali beruntung orang-orang yang bisa jatuh cinta beberapa kali dalam hidupnya. Tetapi aku yakin, lebih beruntung mereka yang sanggup menghabiskan hidupnya dengan satu orang yang dicintai dan mencintainya.

			4 Musim Cinta adalah sebuah novel yang bertutur tentang lika-liku kehidupan cinta empat birokrat muda: satu wanita, tiga pria. Gayatri, wanita Bali yang merasa berbeda dengan wanita-wanita pada umumnya. Gafur, pria Makassar yang menjalin kasih dengan seorang barista asal Sunda yang enggan menikah. Pring, pria Palembang yang nikah muda tetapi harus terpisah jauh dari istrinya karena tugas negara. Arga, pria Jawa yang selalu gagal menjalin hubungan dengan wanita. Mereka bertemu dan saling berbagi rahasia. Tak disangka, setiap rahasia kemudian menjadi benih-benih rindu yang terlarang. Persahabatan, cinta, dan kesetiaan pun dipertaruhkan.</p>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<a href="{{URL::to('summary')}}">pratinjau</a> | <a href="{{URL::to('read')}}">baca</a>
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