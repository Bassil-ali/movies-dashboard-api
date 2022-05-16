@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('movies.movies')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('movies.movies')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12">

                        @if (auth()->user()->hasPermission('delete_movies'))
                            <form method="post" action="{{ route('admin.movies.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="record_ids" id="record-ids">
                                <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> @lang('site.bulk_delete')</button>
                            </form><!-- end of form -->
                        @endif

                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="genre" class="form-control select2" required>
                                <option value="">@lang('site.all') @lang('genres.genres')</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ $genre->id == request()->genre_id ? 'selected' : '' }}>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="actor" class="form-control select2" required>
                                <option value="">@lang('site.all') @lang('actors.actors')</option>
                                @if ($actor)
                                    <option value="{{ $actor->id }}" {{ $actor->id == request()->actor_id ? 'selected' : '' }}>{{ $actor->name }}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="type" class="form-control select2" required>
                                <option value="">@lang('site.all') @lang('movies.movies')</option>
                                @foreach (['now_playing', 'upcoming'] as $type)
                                    <option value="{{ $type }}" {{ $type == request()->type ? 'selected' : '' }}>@lang('movies.' . $type)</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="movies-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="animated-checkbox">
                                            <label class="m-0">
                                                <input type="checkbox" id="record__select-all">
                                                <span class="label-text"></span>
                                            </label>
                                        </div>
                                    </th>
                                    <th>@lang('movies.poster')</th>
                                    <th>@lang('movies.title')</th>
                                    <th>@lang('genres.genres')</th>
                                    <th>@lang('movies.vote')</th>
                                    <th>@lang('movies.vote_count')</th>
                                    <th>@lang('movies.release_date')</th>
                                    <th>@lang('movies.favourite_by')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

        let genre = "{{ request()->genre_id }}";
        let actor = "{{ request()->actor_id }}";
        let type = "{{ request()->type }}";

        let moviesTable = $('#movies-table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.movies.data') }}',
                data: function (d) {
                    d.genre_id = genre;
                    d.actor_id = actor;
                    d.type = type;
                }
            },
            columns: [
                {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'poster', name: 'poster', searchable: false, sortable: false, width: '10%'},
                {data: 'title', name: 'title', width: '15%'},
                {data: 'genres', name: 'genres', searchable: false},
                {data: 'vote', name: 'vote', searchable: false},
                {data: 'vote_count', name: 'vote_count', searchable: false},
                {data: 'release_date', name: 'release_date', searchable: false},
                {data: 'favorite_by_users_count', name: 'favorite_by_users_count', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[5, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#genre').on('change', function () {
            genre = this.value;
            moviesTable.ajax.reload();
        })

        $('#actor').on('change', function () {
            actor = this.value;
            moviesTable.ajax.reload();
        })

        $('#type').on('change', function () {
            type = this.value;
            moviesTable.ajax.reload();
        })

        $('#data-table-search').keyup(function () {
            moviesTable.search(this.value).draw();
        })

        $('#actor').select2({
            ajax: {
                url: "{{ route('admin.actors.index') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });

    </script>

@endpush