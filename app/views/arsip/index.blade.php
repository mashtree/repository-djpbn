@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="jumbotron">
			  <h1>Aplikasi Arsip</h1>
			  <h2>Kantor</h2>
			  <h3>Alamat</h>
			  <p>Telp / Kantor</p>
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading">Daftar Arsip Terkini</div>
		  
	            <table id="example" class="table table-striped table-bordered table-hover">
	            <thead>
	            <tr>
	                <th>#</th>
	                <th>First Name</th>
	                <th>Username</th>
	                <th>User No.</th>
	            </tr>
	            </thead>
	            <tbody>
	            <tr>
	                <td>1</td>
	                <td><span class="label label-primary">Lolo Bird</span></td>
	                <td>@twitter</td>
	                <td>100090</td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>Otto</td>
	                <td>@mdo</td>
	                <td><span class="label label-info">100090</span></td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>Thornton</td>
	                <td>@fat</td>
	                <td>100090</td>
	            </tr>
	                                   
	            <tr>
	                <td>4</td>
	                <td><span class="label label-primary">the Bird</span></td>
	                <td>@twitter</td>
	            	<td>100090</td>
	            </tr>
	            <tr>
	                <td>5</td>
	                <td><span class="label label-success">Thornton</span></td>
	                <td>@fat</td>
	                <td><span class="label label-danger">100090</span></td>
	            </tr>
	                                    
	            <tr>
	                <td>6</td>
	                <td>Otto</td>
	                <td>@mdo</td>
	                <td><span class="label label-info">100090</span></td>
	            </tr>
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
@endsection