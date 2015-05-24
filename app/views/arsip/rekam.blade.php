@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <section class="container">
		<div class="col-md-12">
			<legend>Rekam Arsip</legend>
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		<div class="row">
			{{ Form::open(array('action' => 'ArsipController@store', 'class' => 'form', 'files'=>'true')) }}
		    	<div class="form-group col-lg-6">
					{{ Form::label('arsip', 'Arsip', array('class' => 'control-label')) }}
					{{ Form::text('arsip', null, 
				              array('required', 
				                    'class'=>'form-control', 
				                    'placeholder'=>'Nama Arsip')) }}
				</div>
				<div class="form-group col-lg-6">
			          {{ Form::label('files', 'Dokumen Arsip', array('class' => 'control-label')) }}
			             {{ Form::file('files', array('class'=>'form-control')) }}
			    </div>
			    <div class="form-group col-lg-6">
					{{ Form::label('jenis_arsip_id', 'Jenis Arsip', array('class' => 'control-label')) }}
					{{ Form::select('jenis_arsip_id', $jenisArsip, Input::old('jenis_arsip_id'), array('required', 
				                    		'class'=>'form-control')) }}
				</div>
			    <div class="form-group col-lg-6">
					{{ Form::label('gudang_id', 'Nomor Gudang', array('class' => 'control-label')) }}
					{{ Form::select('gudang_id', $gudang, Input::old('gudang'), array('required', 
				                    		'class'=>'form-control')) }}
				</div>
			    <div class="form-group col-lg-6">
					{{ Form::label('rak_id', 'Nomor Rak', array('class' => 'control-label')) }}
					{{ Form::select('rak_id', $rak, Input::old('rak'), array('required', 
				                    		'class'=>'form-control')) }}
				</div>
			    <div class="form-group col-lg-6">
					{{ Form::label('box_id', 'Nomor Box', array('class' => 'control-label')) }}
					{{ Form::select('box_id', $box, Input::old('box'), array('required', 
				                    		'class'=>'form-control')) }}
				</div>
			    <div class="form-group col-lg-6">
					{{ Form::label('seksi_id', 'Seksi', array('class' => 'control-label')) }}
					{{ Form::select('seksi_id', $seksi, Input::old('seksi'), array('required', 
				                    		'class'=>'form-control')) }}
				</div>

				{{ Form::hidden('user_id', '1') }}

				<div style="text-align: center;">
			      <div class="form-group col-md-12">  
			          {{ Form::submit('Simpan!', 
			            array('class'=>'btn btn-primary')) }}
			      </div>
			    </div> 

			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection