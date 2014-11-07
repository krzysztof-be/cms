@extends('instant.template')

@section('content')

	@if(m('Portfolio')->enabled())
	<section id="works"></section>
	<div class="container">
		<div class="row centered mt mb">
			<h1>PORTFOLIO</h1>
			@foreach(($projects = m('Portfolio')->projects()) as $project)
			
			<div class="col-lg-4 col-md-4 col-sm-4 gallery">
				<a href="{{ url('portfolio/' . $project->slug) }}"><img src="{{$project->getThumb()}}" class="img-responsive"></a>
			</div>

			@endforeach

		</div><! --/row -->
	</div><! --/container -->
	@endif

@stop