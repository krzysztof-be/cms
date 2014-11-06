@extends('default.template')

@section('content')

	<div class="container pt">

		<h4>Ostatnio na blogu</h4>

		@foreach(m('Blog')->last() as $post)

		<li><a href="{{ url('blog/' . $post->slug) }}">
			{{ $post->title }}
		</a></li>


		@endforeach

		<h1>Kategorie</h1>
		@foreach(m('Blog')->categories() as $category)

		<li><a href="{{ url('blog/category/' . $category->slug) }}">
			{{ $category->name }}
		</a></li>

		@endforeach

		<hr>

		<h2>Posty</h2>
		@foreach(($test = $posts) as $post)

		<li><a href="{{ url('blog/' . $post->slug) }}">
			{{ $post->title }}
		</a></li>

		@endforeach

		{!! $test->links() !!}

	</div>

@stop