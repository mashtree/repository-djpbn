@extends('theme.admin')

@section('content')

{{-- LIST COMMENT --}}
@if($act=='list')
<div class="row">
<div class="large-12 columns">
<h2>Daftar Comment</h2>
<table id="list" class="display" cellspacing="0" width="100%">
<thead>
<th>No</th>
<th>Nama Komentator</th>
<th>kategori</th>
<th>komentar</th>
<th>Aksi</th>
</thead>
<tbody>
@foreach($comments as $comment)
<tr>
<td>{{++$no}}</td>
<td>{{$comment->name}}</td>
<td>
@if($comment->cat_comment==1)
	<a href="{{URL::to('book/'.$comment->id_obj)}}">
@else
	<a href="{{URL::to('author/'.$comment->id_obj)}}">
@endif
{{($comment->cat_comment==1)?'katalog':'author'}}</a></td>
<td>{{$comment->comment}}</td>
<td><a href="{{URL::to('admin/rmcomment/'.$comment->id)}}">delete</a></td>
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

<h2>Rekam Comment</h2>
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
{{ Form::open(array('route' => 'comment','id'=>'rkmComment')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Comment</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::hidden('id',$id)}}
				{{ Form::hidden('type',$type)}}
				{{ Form::label('name','NAMA KOMENTATOR')}}
				{{ Form::text('name','',array('required','placeholder'=>'nama komentator'))}}
				{{ Form::label('comment','KOMENTAR ')}}
				{{ Form::textarea('comment')}}
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