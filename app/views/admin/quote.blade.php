@extends('theme.admin')

@section('content')

{{-- LIST USER --}}
@if($act=='list')
<div class="row">
<div class="large-12 columns">
<h2>Daftar Quote</h2>
<a href="{{URL::to('admin/rkmquote')}}"><button class="tiny">rekam</button></a>
<table id="list" class="display" cellspacing="0" width="100%">
<thead>
<th>No</th>
<th>Quote</th>
<th>Tanggal Tampil</th>
<th>Aksi</th>
</thead>
<tbody>
@foreach($quotes as $quote)
<tr>
<td>{{++$no}}</td>
<td>{{$quote->quote}}</td>
<td>{{$quote->date}}</td>
<td><a href="{{URL::to('admin/edquote/'.$quote->id)}}">edit</a> | <a href="{{URL::to('admin/rmquote/'.$quote->id)}}">delete</a></td>
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

<h2>Rekam Quote</h2>
@if (count($errors) > 0)
	<div class="message message-fail">
		<span class='close'>x</span>
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
{{ Form::open(array('route' => 'quote','files'=>true,'id'=>'rkmAuthor')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Quote</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('quote','QUOTE')}}
				{{ Form::text('quote',Form::old('quote'),array('required','placeholder'=>'tulis quote, maksimal 255 karakter'))}}
				{{ Form::label('date','TANGGAL TAMPIL QUOTE [abaikan untuk ditampilkan random]')}}
				{{ Form::text('date',Form::old('date'),array('placeholder'=>'TANGGAL QUOTE','id'=>'datepicker','readonly'))}}
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
{{-- UBAH --}}
@elseif($act=='edit')
<div class="row">
<div class="large-8 columns end">

<h2>Ubah Quote</h2>
@if (count($errors) > 0)
	<div class="message message-fail">
		<span class='close'>x</span>
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
{{ Form::model($quote,array('route' => ['quote.update',$quote->id])) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Quote</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::hidden('id',$quote->id) }}
				{{ Form::label('quote','QUOTE')}}
				{{ Form::text('quote')}}
				{{ Form::label('date','TANGGAL TAMPIL QUOTE [abaikan untuk ditampilkan random]')}}
				{{ Form::text('date')}}
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
		$('input[name="date"]').fdatepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
@endif
@stop