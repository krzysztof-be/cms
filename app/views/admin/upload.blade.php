@extends('admin.template')

@section('content')

	<h3 class="pull-left">Instalacja szablonu</h3>

	<div class="clearfix"></div>

	<br>

		{!! Form::open([ 'url' => 'admin/install', 'files' => 'true']) !!}

			{!! Form::file('theme', [ 'class' => 'form-control pull-left']) !!}

	<div class="clearfix"></div>
			<br>
			{!! Form::submit('wgraj szablon', [ 'class' => 'btn btn-primary btn-lg pull-right']) !!}

		{!! Form::close() !!}


	</div>

@stop
