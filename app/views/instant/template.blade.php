<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>{{ m('Info')->title() }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ a('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ a('css/style.css') }}" rel="stylesheet">
    <link href="{{ a('css/config.css') }}" rel="stylesheet">
    <link href="{{ a('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ home() }}">{{ m('Info')->name() }}</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @foreach( m('Menu')->get() as $menu )
            <li><a href="{{ url($menu->url) }}">{{ $menu->display_name }}</a></li>
            @endforeach
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


	<div id="headerwrap" style="background: url({{ asset('assets/info/' . m('Info')->cover()) }}) no-repeat center top;">
	    <div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<h1>{!! m('Info')->header() !!}</h1>
					<h4>{!! m('Info')->about() !!}</h4>
				</div>
			</div><! --/row -->
	    </div> <!-- /container -->
	</div><! --/headerwrap -->
		
	<div class="content"> 
		
		@yield('content')

	</div>
	
	@if(m('Contact')->enabled())
	<div id="social">
		<div class="container">
			<div class="row centered">
				@if(m('Contact')->setting('facebook'))
				<div class="col-lg-4">
					<a href="{{ m('Contact')->setting('facebook') }}"><i class="fa fa-facebook"></i></a>
				</div>
				@endif
				@if(m('Contact')->setting('twitter'))
				<div class="col-lg-4">
					<a href="{{ m('Contact')->setting('twitter') }}"><i class="fa fa-twitter"></i></a>
				</div>
				@endif
				@if(m('Contact')->setting('gplus'))
				<div class="col-lg-4">
					<a href="{{ m('Contact')->setting('gplus') }}"><i class="fa fa-google-plus"></i></a>
				</div>
				@endif
			
			</div><! --/row -->
		</div><! --/container -->
	</div><! --/social -->
	@endif

	<div id="footerwrap">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-12">
					<p><b>{!! m('Info')->footer() !!}</b></p>
				</div>
			</div>
		</div>
	</div><! --/footerwrap -->
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ a('js/bootstrap.min.js') }}"></script>
  </body>
</html>
