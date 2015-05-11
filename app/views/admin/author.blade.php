@extends('theme.admin')

@section('content')
<div class="row">
<div class="large-8 columns end">
@if(Session::has('sukses'))
    <div class='message message-success'>
    <span class='close'></span>
      {{ Session::get('sukses'); }}
    </div>
  @endif
<h2>Rekam Katalog</h2>
{{ Form::open(array('route' => 'author','files'=>true,'id'=>'rkmAuthor')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Author</legend>
			<div class="row">
			<div class="large-12 columns">
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
					<input class="button" type="submit" name="submit" value="kirim" id="sAuthor">	
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
@stop