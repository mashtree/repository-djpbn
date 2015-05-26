@extends('theme.default')

@section('content')

<div class="row">
<div class="large-2 columns">&nbsp;</div>
<div class="large-8 columns end">
<div class="logo">
	<img src="image/logo.png">
</div>
<div class="form-search">
	<form>
		<input type="text" id="search" name="keyword" placeholder="type something or keyword with parameter like pengarang:[nama pengarang]">
	</form>
</div>
<div class="tag-line">
	<span>Menulislah!</span>
</div>
</div>
</div>

@stop