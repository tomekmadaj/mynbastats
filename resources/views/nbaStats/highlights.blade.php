@extends('layout.main')

@section('content')
    <h5 class="mb-4">
        <b> {{ $team }} latest highlights</b>
    </h5>
    <div class="row">
        @foreach ($videos->items as $video)
            <div class="col-4 mb-4 me-5">
                @if (isset($video->id->videoId))
                    <div>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->id->videoId }}"
                            frameborder="0" allowfullscreen></iframe>
                        <h6 class="mt-2">{{ $video->snippet->title }}</h4>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
