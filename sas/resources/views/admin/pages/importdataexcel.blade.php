@extends('admin.layouts.template')


@section('content')

	<div class="container" style=margin-top:80px;>		

		<div class="panel panel-default">

		  <div class="panel-heading">
		  		<h4>
		  		<strong>IMPORT FILE</strong>
		  		</h4>
		  </div>

		  <div class="panel-body">


		  		@if ($message = Session::get('success'))

					<div class="alert alert-success" role="alert">

						{{ Session::get('success') }}

					</div>

				@endif


				@if ($message = Session::get('error'))

					<div class="alert alert-danger" role="alert">

						{{ Session::get('error') }}

					</div>

				@endif

				<form action="{{ URL::to('importdatakaryawan-proses') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

					<input type="file" name="import_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />

					{{ csrf_field() }}

					<br/>

					<button class="btn btn-success">Import Data Karyawan</button>

				</form>

		  </div>

		</div>

	</div>

@endsection