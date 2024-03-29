@extends('admin.template')

@section('content')

	<h3 class="pull-left">{{ tr('admin.settings') }}</h3>

	<div class=""> 

		<div class="clearfix"></div>

		<hr>

	{!! Form::open([ 'url' => 'admin/settings' ]) !!}

		{!! Form::submit(tr('admin.save'), [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}


	
		<h4>{!! Form::label('language', tr('admin.language')) !!}</h4>
		<p class="text-muted">{{ tr('admin.language_desc') }}</p>

		{!! Form::select('language', [ 'pl' => 'polski'], \App\Settings::value('language', 'pl'), [ 'class' => 'form-control input-lg', 'rows' => 1 ]) !!}


	{!! Form::close() !!}

		<br>


	
		<h4>{!! Form::label('email', 'Adres e-mail') !!}</h4>
		<p class="text-muted">Podany przy rejestracji, nie można go zmienić</p>
		
		{!! Form::text('email', \Auth::user()->email, [ 'class' => 'form-control input-lg', 'disabled' => 'disabled' ]) !!}


		<br><br>

		<h3>Zmiana hasła</h3>


		<hr>

		{!! Form::open([ 'url' => 'password' ]) !!}

			{!! Form::label('old_password', 'Obecne hasło') !!}

			{!! Form::password('old_password', [ 'class' => 'form-control input-lg']) !!}

			<br>

			{!! Form::label('password', 'Nowe hasło') !!}

			{!! Form::password('password', [ 'class' => 'form-control input-lg']) !!}

			<br>

			{!! Form::label('password_confirmation', 'Powtórz nowe hasło') !!}

			{!! Form::password('password_confirmation', [ 'class' => 'form-control input-lg']) !!}

			<br>

			{!! Form::submit('Zmień hasło', [ 'class' => 'btn btn-lg btn-secondary']) !!}

		{!! Form::close() !!}


		<br><br>

		<h3>Kopia zapasowa</h3>

		<hr>

		<p>Aby zabezpieczyć dane swojej strony, możesz archiwizować je co jakiś czas na dysku swojego komputera.</p>
		<p>Dane na naszych serwerach są szyfrowane, jednak nie udostępniaj ich nikomu.</p>

		<br>

		{!! Form::open([ 'url' => 'backup' ]) !!}

			{!! Form::submit('Pobierz kopię bazy danych', [ 'class' => 'btn btn-lg btn-success']) !!}

		{!! Form::close() !!}

	</div>

@stop
