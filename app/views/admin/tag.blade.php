@extends('theme.admin')

@section('content')

<div class="row">
<div class="large-8 columns end">
@if(Session::has('sukses'))
    <div class='message message-success'>
    <span class='close'>x</span>
      {{ Session::get('sukses'); }}
    </div>
  @endif
<h2>Rekam Tags</h2>
{{ Form::open(array('route' => 'tag','files'=>true,'id'=>'rkmTags')) }}
{{ Form::token() }}
<fieldset>
			<legend style="color:#52B3AE" class="font-grey">Rekam Tags</legend>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('tag','NAMA TAG')}}
				{{ Form::text('tag','',array('required','placeholder'=>'nama tag'))}}
			</div>				
			</div>
			<div class="row">
				<div class="middle-12 columns" style="text-align:right">
					{{Form::submit('submit',array('class'=>'button'))}}
					<!--<input class="button" type="submit" name="submit" value="kirim" id="sAuthor">	-->
				</div>
			</div>
			
		</fieldset>
{{ Form::close()}}
</div>
</div>

@stop