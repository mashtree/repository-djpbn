@extends('theme.admin')

@section('content')

{{-- LIST USER --}}
@if($act=='list')
<div class="row">
<div class="large-12 columns">
<h2>Daftar User</h2>
<a href="{{URL::to('admin/rkmuser')}}"><button class="tiny">rekam</button></a>
<table id="list" class="display" cellspacing="0" width="100%">
<thead>
<th>No</th>
<th>Nama User</th>
<th>Role</th>
<th>Aksi</th>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{++$no}}</td>
<td>{{$user->username}}</td>
<td>{{$user->role}}</td>
<td><a href="{{URL::to('admin/eduser/'.$user->id)}}">edit</a> | <a href="{{URL::to('admin/rmuser/'.$user->id)}}">delete</a></td>
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
{{ Form::open(array('route' => 'user','id'=>'rkmUser')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam User</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('username','NAMA USER')}}
				{{ Form::text('username','',array('required','placeholder'=>'nama user'))}}
				{{ Form::label('password','PASSWORD')}}
				{{ Form::password('password','',array('required','placeholder'=>'******'))}}
				{{ Form::label('password2','ULANGI PASSWORD')}}
				{{ Form::password('password2','',array('required','placeholder'=>''))}}
				{{ Form::label('role','ROLE ')}}
				{{ Form::select('role',$role)}}
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