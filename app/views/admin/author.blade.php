@extends('theme.admin')

@section('content')
{{-- LIST AUTHOR --}}
@if($act=='list')
<div class="row")
<div class="large-8 columns">
<h2>Daftar Author</h2>
<a href="{{URL::to('admin/rkmauthor')}}"><button class="tiny">rekam</button></a>
<table id="list" class="display" cellspacing="0" width="100%">
<thead>
<th>No</th>
<th>Nama . NIP</th>
<th>aksi</th>
</thead>
<tbody>
@foreach($author as $author)
<tr>
<td>{{++$no}}</td>
<td>{{$author->authorname}}<br/>{{$author->nip}}</td>
<td><a href="{{URL::to('admin/edauthor/'.$author->id)}}">edit</a> | <a href="{{URL::to('admin/rmauthor/'.$author->id)}}">delete</a></td>
</th>
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

<h2>Rekam Author</h2>
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
{{ Form::open(array('route' => 'author','files'=>true,'id'=>'rkmAuthor')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Author</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('authorname','NAMA')}}
				{{ Form::text('authorname','',array('required','placeholder'=>'nama author creator'))}}
				{{ Form::label('nip','NIP')}}
				{{ Form::text('nip','',array('placeholder'=>'NIP bagi yang memiliki'))}}
				{{ Form::label('idp','NOMOR IDENTITAS')}}
				{{ Form::text('idp','',array('placeholder'=>'nomor identitas (selain NIP'))}}
				{{ Form::label('phone','NOMOR TELEPON')}}
				{{ Form::text('phone','',array('required','placeholder'=>'nomor telepon'))}}
				{{ Form::label('birthplace','TEMPAT LAHIR')}}
				{{ Form::text('birthplace','',array('required','placeholder'=>'Tempat Lahir'))}}
				{{ Form::label('birthdate','TANGGAL LAHIR')}}
				{{ Form::text('birthdate','',array('placeholder'=>'TANGGAL LAHIR','id'=>'datepicker','readonly'))}}
				{{ Form::label('foto','foto')}}
				{{ Form::file('foto',array('class'=>'button tiny','id'=>'fAuthor'))}}
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
					<input class="button" type="submit" name="submit" value="Click me!" id="sAuthor">	
				</div>
			</div>
			
		</fieldset>
{{ Form::close()}}
</div>
</div>
<script type="text/javascript">
	$(function () {
		window.prettyPrint && prettyPrint();
		$('#datepicker').fdatepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
@endif
@stop