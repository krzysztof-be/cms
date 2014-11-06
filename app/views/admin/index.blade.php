@extends('admin.template')

@section('content')

    <div class="row">

        <div class="col-md-6 col-lg-5">

            <div class="row">

                <h3>KK CMS</h3>

                <hr>

                <i>

                    <p>Witaj w systemie CMS, który pozwoli Ci w kilku krokach stworzyć nowoczesną stronę internetową!</p>
                
                </i>

                <p>Jeśli dopiero zaczynasz tworzyć swoją pierwszą stronę, zajrzyj do działu <a href="{{ url('admin/help') }}">Pomocy</a>, gdzie znajdziesz instrukcje oraz odpowiedzi na najczęstsze problemy.</p>
            </div>

            <br>
            
            <a class="twitter-timeline"  href="https://twitter.com/KKStudioCMS" data-widget-id="525701394041286656">Tweety na temat @KKStudioCMS</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            
        </div>

        <div class="col-md-6 col-lg-7">

        	<h3>{{ tr('admin.basic') }}</h3>

        	<hr>

        	<ul class="list-unstyled">

                @foreach($modules as $module)

                    <li>
                        <h4 style="line-height: 32px;">

                            {{ tr('admin.' . $module->slug) }}

                            @if(in_array($module->slug, [ 'menu', 'info', 'page']))


                            <button class="btn btn-success pull-left btn-sm" style="margin-right: 10px;">

                                Zawsze włączony

                            </button>

                            @else

                                @if($module->status == 'enabled')

                                <a href="{{ url('admin/turnoff/' . $module->slug) }}" class="btn btn-primary pull-left btn-sm" style="margin-right: 10px;">

                                    Włączony

                                </a>

                                @else

                                <a href="{{ url('admin/turnon/' . $module->slug) }}" class="btn btn-default pull-left btn-sm" style="margin-right: 10px;">

                                    Wyłączony

                                </a>

                                @endif

                            @endif

                        </h4>

                        <div class="clearfix"></div>

                    </li>

                @endforeach

        	</ul>

        </div>

    </div>

@stop
