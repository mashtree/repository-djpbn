@extends('theme.admin')

@section('content')
{{-- LIST KATALOG --}}
@if($act=='list')
<div class="row">
<div class="large-12 columns">
<h2>Daftar Katalog</h2>
<a href="{{URL::to('admin/rkmkatalog')}}"><button class="tiny">rekam selain artikel</button></a>
<a href="{{URL::to('admin/rkmartikel')}}"><button class="tiny">rekam artikel</button></a>
<table id="list" class="display" cellspacing="0" width="100%">
<thead>
<th>No</th>
<th>Judul</th>
<th>Kategori</th>
<th>Tahun Terbit</th>
<th>Aksi</th>
</thead>
<tbody>
@foreach($kat as $kat)
<tr>
<td>{{ $no++ }}</td>
<td>{{$kat->title}}</td>
<td>{{$kat->categoryname}}</td>
<td>{{$kat->release}}</td>
<td><a href="{{URL::to('admin/edkatalog/'.$kat->id)}}">edit</a> | <a href="{{URL::to('admin/rmkatalog/'.$kat->id)}}">delete</a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<script>
$(function(){
	$('#list').dataTable();
});
</script>
{{-- REKAM --}}
@elseif($act=='add')
<div class="row">
<div class="large-8 columns end">
<h2>Rekam Katalog</h2>
@if (count($errors) > 0)
	<div class="message message-fail">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if(Session::has('sukses'))
    <div class='message message-success'>
    <span class='close'>x</span>
      {{ Session::get('sukses'); }}
    </div>
  @endif
{{ Form::open(array('route' => 'katalog','files'=>true)) }}
{{ Form::token() }}
<fieldset>
	<legend>INFORMASI KARYA</legend>
	{{ Form::label('title','JUDUL')}}
	{{ Form::text('title','',array('required','placeholder'=>'judul karya'))}}
	{{ Form::label('category','KATEGORI KARYA')}}
	{{ Form::select('category',$kat)}}
	{{ Form::label('summary','RINGKASAN/--')}}
	{{ Form::textarea('summary','ringkasan, tentang, sepatah kalimat yang menggambarkan isi karya')}}
	{{ Form::label('release','TAHUN TERBIT')}}
	{{ Form::select('release',$year)}}
	{{ Form::label('numpage','JUMLAH HALAMAN')}}
	{{ Form::text('numpage','',array('required','placeholder'=>'video isikan durasi waktu'))}}
	{{ Form::label('isbn','ISBN')}}
	{{ Form::text('isbn','',array('placeholder'=>'ISBN karya'))}}
</fieldset>
<fieldset>
	<legend>AUTHOR</legend>
	{{-- data-reveal-id="author-modal" --}}
	<div>tidak ditemukan author? <a href="{{URL::to('admin/aAuthor')}}" >klik disini</a> untuk menambahkan</div>
	<div class="input_fields_wrap">
    <div><select name="author[]" id="author_select">
    {{--
    	@foreach($author as $key=>$value)
    		<option value="{{ $value->id }}">{{ $value->authorname }}</option>
    	@endforeach
    --}}
    </select></div>
	</div>
	<button class="add_field_button button tiny" title="tambah kolom lagiii...">+</button>
</fieldset>
<script type="text/javascript">
	$(function(){
		content_author();
		
	});

	var content_author = function(){
		var url ='http://localhost/repository-djpbn-master/public/get_author';
		var wrapper = document.getElementById('author_select');
		var option = '<option value=0>--PILIH AUTHOR--</option>';
		$.getJSON(url, function(data) {

	        for (var i in data) {
	        	//console.log(data[i]);
	            option = option+'<option value='+data[i].id+'>'+data[i].name+' - '+data[i].nip+'</option>';
	        };
	        console.log(data);
	        //console.log(option);
	        $(wrapper).append(option);
	    });
	}
</script>
<fieldset>
	<legend>FILE</legend>
	{{ Form::file('file',array('class'=>'button tiny'))}}
	<legend>GAMBAR KOVER</legend>
	{{ Form::file('cover',array('class'=>'button tiny'))}}
</fieldset>
{{ Form::submit('Click me!',array('class'=>'button small','name'=>'submit'))}}
{{ Form::close() }}
</div>
</div>
<!-- add author -->
	<div id="author-modal" class="reveal-modal" data-reveal >
		<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Author</legend>
			{{ Form::open(array('files'=>true,'id'=>'rkmAuthor')) }}
			<div class="row">
			<div class="large-6 columns end">
				{{ Form::label('authorname','NAMA')}}
				{{ Form::text('authorname','',array('placeholder'=>'nama author creator'))}}
				{{ Form::label('nip','NIP')}}
				{{ Form::text('nip','',array('placeholder'=>'NIP bagi yang memiliki'))}}
				{{ Form::label('idp','NOMOR IDENTITAS')}}
				{{ Form::text('idp','',array('placeholder'=>'nomor identitas (selain NIP'))}}
				{{ Form::label('phone','NOMOR TELEPON')}}
				{{ Form::text('phone','',array('placeholder'=>'nomor telepon'))}}
				{{ Form::label('birthplace','TEMPAT LAHIR')}}
				{{ Form::text('birthplace','',array('placeholder'=>'Tempat Lahir'))}}
				{{ Form::label('birthdate','TANGGAL LAHIR')}}
				{{ Form::text('birthdate','',array('placeholder'=>'TANGGAL LAHIR'))}}
				{{ Form::label('foto','foto')}}
				{{ Form::file('foto',array('class'=>'button tiny','id'=>'fAuthor'))}}
			</div>
			<div class="large-6 columns end">
				{{ Form::label('address','ALAMAT TEMPAT TINGGAL')}}
				{{ Form::textarea('address')}}
				{{ Form::label('office','ALAMAT KANTOR')}}
				{{ Form::textarea('office')}}
				{{ Form::label('about','SEPATAH KATA TENTANG DOI')}}
				{{ Form::textarea('about')}}
			</div>				
			</div>
			<div class="row">
				<div class="middle-12 columns" style="text-align:right">
					<input class="button" type="button" name="ok" value="kirim" id="sAuthor">	
				</div>
			</div>
			{{ Form::close()}}
		</fieldset>
		<a class="close-reveal-modal">&#215;</a>
	</div>
<script type="text/javascript">
	$('#sAuthor').click(function(){
		var formData = new FormData($('#rkmAuthor')[0]);
        console.log(formData);
	    $.ajax({
	        url: 'aAuthor',
	        type: 'POST',
	        data: formData,
	        async: false,
	        success: function () {
	             console.log('tes');   
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	   	//e.preventDefault();
	});
</script>
@endif
@stop