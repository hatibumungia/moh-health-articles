@extends('layouts.app')

@section('title', 'Videos')

@section('content')

    {{-- banner --}}
    <div class="container">
        @include('partials.banner')
    </div>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                @if($videos->count() > 0)
                    @foreach($videos->chunk(1) as $videosSet)
                        <div class="row text-center">
                            @foreach($videosSet as $video)
                                <div class="col-xs-12 col-sm-12">
                                    <div class="panel panel-default">
                                    	<div class="panel-body">
											{!! $video->url !!}
                                    	</div>
                                    	<div class="panel-footer">
                                    		<h5><a href="{{ url('videos/' . $video->slug) }}">{{ str_limit($video->title, 50) }}</a></h5>
                                    		<p><span style="background-color: {{ $video->category->color }}">&nbsp;</span> {{ $video->category->name }}</p>
                                    	</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="jumbotron text-center jumbotron-message">
                        <h1>No video</h1>
                    </div>
                @endif
            </div>
        </div>

        <div class="text-center">
            {{ $videos->links() }}
        </div>
    </div>

    @include('partials.footer')

@endsection