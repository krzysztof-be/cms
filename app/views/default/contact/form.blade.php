@extends('default.template')

@section('content')

	<div class="container pt">

	@include('flash::message')

		{!! Form::open([ 'url' => 'contact' ]) !!}

			{!! Form::label('title', 'Temat wiadomości') !!}
			{!! Form::text('title', '', [ 'class' => 'form-control input-lg']) !!}
			<br>

			{!! Form::label('email', 'Adres e-mail') !!}
			{!! Form::email('email', '', [ 'class' => 'form-control input-lg']) !!}
			<br>

			{!! Form::label('content', 'Treść wiadomości') !!}
			{!! Form::textarea('content', '', [ 'class' => 'form-control input-lg']) !!}
			<br>

			{!! Form::submit('wyślij wiadomość', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

			<div class="clearfix"></div>

		{!! Form::close() !!}

	</div>

@stop