@extends('layout.main')

@section('content')
    <h5 class="mb-4">
        <img style="height: 30px" src="/images/NbaLogos/NBA-logo.png" class="mx-auto rounded">
        <b>NBA latest highlights</b>
    </h5>
    @if (!empty($videos))
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-6 mb-4 me-5">
                    @if (isset($video->id->videoId))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/{{ $video->id->videoId }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                        <h6 class="mt-2">{{ $video->snippet->title }}</h4>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p>There's no recent highlights for {{ $team->fullName }} </p>
    @endif
@endsection
