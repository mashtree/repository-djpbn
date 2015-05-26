@extends('theme.default')

@section('content')

{{--content--}}
<div class="units-row">
<div class="large-4 columns">&nbsp;</div>
<div class="large-4 columns end">
<div style="
		margin-top:150px;
	">
	<div>OLIS - LOGIN</div>
	{{Form::open(array('url'=>'login'))}}
	{{Form::text('username',Form::old('username'),array('placeholder'=>'username'))}}
	{{Form::password('password','',array('placeholder'=>'******'))}}
	{{Form::submit('Login',array('class'=>'button small'))}}
	{{Form::close()}}
</div>
</div>
</div>
@stop