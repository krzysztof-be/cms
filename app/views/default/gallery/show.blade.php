@extends('default.template')

@section('content')


	<div class="container pt">

		<img src="{{$album->getThumb()}}">

			<h4>{{$album->name}}</h4>
			<p> {!! $album->description !!}</p>

	</div>
	<div class="container pt">

		@foreach($pictures as $picture)

			<img src="{{$picture->getThumb()}}">

			<br><br>

		@endforeach

	</div>

	@if(s('disqus', ''))

	    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = '{{ s('disqus', '') }}'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    

	@endif

@stop