@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('movies.movies')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.movies.index') }}">@lang('movies.movies')</a></li>
        <li class="breadcrumb-item">@lang('site.show')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ $movie->poster_path }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-md-10">
                        <h2>{{ $movie->title }}</h2>

                        @foreach ($movie->genres as $genre)
                            <h5 class="d-inline-block"><span class="badge badge-primary">{{ $genre->name }}</span></h5>
                        @endforeach

                        <p style="font-size: 16px;">{{ $movie->description }}</p>

                        <div class="d-flex mb-2">
                            <i class="fa fa-star text-warning" style="font-size: 35px;"></i>
                            <h3 class="m-0 mx-2">{{ $movie->vote }}</h3>
                            <p class="m-0 align-self-center">@lang('movies.by') {{ $movie->vote_count }}</p>
                        </div>

                        <p><span class="font-weight-bold">@lang('movies.language')</span>: en</p>
                        <p><span class="font-weight-bold">@lang('movies.release_date')</span>: {{ $movie->release_date }}</p>

                        <hr>

                        <div class="row" id="movie-images">

                            @foreach ($movie->images as $image)

                                <div class="col-md-3 my-2">
                                    <a href="{{ $image->image_path }}"><img src="{{ $image->image_path }}" class="img-fluid" alt=""></a>
                                </div><!-- end of col -->
                            @endforeach

                        </div><!-- end of row -->

                        <hr>

                        <div class="row">

                            @foreach ($movie->actors as $actor)

                                <div class="col-md-2 my-2">
                                    <a href="{{ route('admin.movies.index', ['actor_id' => $actor->id]) }}">
                                        <img src="{{ $actor->image_path }}" class="img-fluid" alt="">
                                    </a>
                                </div><!-- end of col -->

                            @endforeach

                        </div><!-- end of row -->

                    </div><!-- end of col  -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>
        $(function () {

            $('#movie-images').magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

        });//end of document ready

    </script>
@endpush

