@extends('theme.default')

@section('content')

{{--content--}}
<div class="units-row">
<div class="large-4 columns">&nbsp;</div>
<div class="large-4 columns end">
	{{Form::open(array('url'=>'login'))}}
	{{Form::text('username','',array('placeholder'=>'username'))}}
	{{Form::password('password','',array('placeholder'=>'******'))}}
	{{Form::submit('Login',array('class'=>'button'))}}
	{{Form::close()}}
</div>
</div>
@stop