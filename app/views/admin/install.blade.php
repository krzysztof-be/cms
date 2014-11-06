<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KK Studio CMS | Instalacja</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


  <div id="wrapper">

    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
            <ul class="nav navbar-nav">
              <li class="">
                  <a href="{{ url('admin') }}" class="btn">
                      <span>KK CMS - Instalacja</span>
                  </a>
              </li>
            </ul>
            </div></nav>

    <div class="row"> 

    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    

        <br>

    @include('flash::message')
    @foreach($errors->all() as $error) 
        
        <div class="alert alert-danger">{{ $error }}</div>

    @endforeach 


    {!! Form::open(['url' => 'install']) !!}

        {!! Form::label('email', 'Adres e-mail administratora', [ 'style' => 'color: #eee; font-weight: bold; font-size: 16px; text-transform:uppercase;']) !!}

        {!! Form::email('email', '', ['class' => 'form-control']) !!}<br>

        {!! Form::label('password', 'Hasło administratora', [ 'style' => 'color: #eee; font-weight: bold; font-size: 16px; text-transform:uppercase;']) !!}

        {!! Form::password('password', ['class' => 'form-control']) !!}<br>

        {!! Form::label('password_confirmation', 'Potwierdź hasło', [ 'style' => 'color: #eee; font-weight: bold; font-size: 16px; text-transform:uppercase;']) !!}

        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}<br>

        {!! Form::submit('Rozpocznij instalację', ['class' => 'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}

    <br><br>

    <p style="color: #777; font-size: 16px; text-transform:uppercase;
    font-weight:bold;">KK Studio</p>

    </div>

</div>
</div>

  </body>
</html>