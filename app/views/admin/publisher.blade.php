@extends('theme.admin')

@section('content')

{{-- LIST PUBLISHER --}}
@if($act=='list')
<div class="row">
<div class="large-12 columns">
<h2>Daftar Publisher</h2>
<a href="{{URL::to('admin/rkmpublisher')}}"><button class="tiny">rekam</button></a>
<table id="list" class="display" cellspacing="0" width="100%">
<thead>
<th>No</th>
<th>Nama Publisher</th>
<th>Aksi</th>
</thead>
<tbody>
@foreach($publisher as $publisher)
<tr>
<td>{{++$no}}</td>
<td>{{$publisher->publishername}}</td>
<td><a href="{{URL::to('admin/edpublisher/'.$publisher->id)}}">edit</a> | <a href="{{URL::to('admin/rmpublisher/'.$publisher->id)}}">delete</a></td>
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
@elseif($act=='add')<div class="row">
<div class="large-8 columns end">

<h2>Rekam Penerbit</h2>
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
{{ Form::open(array('route' => 'publisher','files'=>true,'id'=>'rkmPublisher')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Penerbit</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('publishername','NAMA')}}
				{{ Form::text('publishername','',array('required','placeholder'=>'nama publisher'))}}
				{{ Form::label('phone','NOMOR TELEPON')}}
				{{ Form::text('phone','',array('required','placeholder'=>'nomor telepon'))}}
				{{ Form::label('email','EMAIL')}}
				{{ Form::text('email','',array('required','placeholder'=>'email publisher'))}}
				{{ Form::label('address','ALAMAT ')}}
				{{ Form::textarea('address')}}
			</div>				
			</div>
			<div class="row">
				<div class="middle-12 columns" style="text-align:right">
					{{Form::submit('Click me!',array('class'=>'button small','name'=>'submit'))}}
					<!--<input class="button" type="submit" name="submit" value="kirim" id="sAuthor">	-->
				</div>
			</div>
			
		</fieldset>
{{ Form::close()}}
</div>
</div>
{{-- UBAH --}}
@elseif($act=='edit')
<div class="row">
<div class="large-8 columns end">

<h2>Ubah Penerbit</h2>
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
{{ Form::model($publisher, array('route' => ['publisher.update',$publisher->id])) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Penerbit</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::hidden('id',$publisher->id)}}
				{{ Form::label('publishername','NAMA')}}
				{{ Form::text('publishername')}}
				{{ Form::label('phone','NOMOR TELEPON')}}
				{{ Form::text('phone')}}
				{{ Form::label('email','EMAIL')}}
				{{ Form::text('email')}}
				{{ Form::label('address','ALAMAT ')}}
				{{ Form::textarea('address')}}
			</div>				
			</div>
			<div class="row">
				<div class="middle-12 columns" style="text-align:right">
					{{Form::submit('Click me!',array('class'=>'button small','name'=>'submit'))}}
					<!--<input class="button" type="submit" name="submit" value="kirim" id="sAuthor">	-->
				</div>
			</div>
			
		</fieldset>
{{ Form::close()}}
</div>
</div>
@endif

@stop