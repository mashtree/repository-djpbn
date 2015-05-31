@extends('theme.admin')

@section('content')

<div class="row">

<div class="large-12 columns end">
<h2>Rekam Artikel</h2>
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
{{Form::open(array('route'=>'artikel','files'=>true))}}
{{Form::text('title','',array('required','class'=>'','placeholder'=>'Judul artikel'))}}
{{Form::text('tag','',array('required','placeholder'=>'tag::pisahkan tag dengan tanda koma'))}}
<div>
<span>tags : </span>
	@foreach($tags as $tag)
		<a><span class="tag" style="cursor:pointer">{{$tag->tag}}</span></a>,
	@endforeach
</div>
<script>
	$('.tag').click(function(){
		tag = $('.tag').eq($('.tag').index(this)).text();
		exist = $('input[name=tag]').val().replace(/[ ]/g,'');
		tmp = exist.split(',');
		if($.inArray(tag,tmp)<0){
			if(exist!=''){
				$('input[name=tag]').val(exist+','+tag);
			}else{
				$('input[name=tag]').val(tag);
			}
		}
	});
</script>
<fieldset>
{{Form::textarea('content','',array('id'=>'artikel','cols'=>50,'rows'=>50))}}
</fieldset>
<fieldset>
	<legend>AUTHOR</legend>
	{{-- data-reveal-id="author-modal" --}}
	<div>tidak ditemukan author? <a href="{{URL::to('admin/rkmuthor')}}" >klik disini</a> untuk menambahkan</div>
	<div class="input_fields_wrap">
    <div><select name="author[]" id="author_select">
    {{--
    	@foreach($author as $key=>$value)
    		<option value="{{ $value->id }}">{{ $value->authorname }}</option>
    	@endforeach
    --}}
    </select></div>
	</div>
	<button class="add_field_button button tiny" title="tambah kolom lagiii...">+</button>
</fieldset>
{{Form::submit('Click me!',array('class'=>'button small right','name'=>'submit'))}}
{{Form::close()}}
</div>

</div>
<script>tinymce.init({selector:'textarea'});</script>
<script type="text/javascript">
	$(function(){
		content_author();
		
	});

	var content_author = function(){
		var url ='http://localhost/repository-djpbn-master/public/get_author';
		var wrapper = document.getElementById('author_select');
		var option = '<option value=0>--PILIH AUTHOR--</option>';
		$.getJSON(url, function(data) {

	        for (var i in data) {
	        	//console.log(data[i]);
	            option = option+'<option value='+data[i].id+'>'+data[i].name+' - '+data[i].nip+'</option>';
	        };
	        //console.log(data);
	        //console.log(option);
	        $(wrapper).append(option);
	    });
	}
</script>
@stop 