@extends('theme.default')

@section('content')

{{--content--}}
<div class="units-row">
<div class="large-4 columns">&nbsp;</div>
<div class="large-4 columns end">
<div style="
		margin-top:100px;
	">
	<div style="text-align:center;margin-botton:50px"><img width="200px"src="{{URL::to('image/logo.png')}}"></div>
	<div style="margin-top:50px">
	{{Form::open(array('url'=>'login'))}}
	{{Form::text('username',Form::old('username'),array('placeholder'=>'username'))}}
	{{Form::password('password','',array('placeholder'=>'******'))}}
	{{Form::submit('Login',array('class'=>'button small'))}}
	{{Form::close()}}
	</div>
</div>
</div>
</div>
@stop