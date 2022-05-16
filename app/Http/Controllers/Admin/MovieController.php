<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Yajra\DataTables\DataTables;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_movies')->only(['index']);
        $this->middleware('permission:create_movies')->only(['create', 'store']);
        $this->middleware('permission:update_movies')->only(['edit', 'update']);
        $this->middleware('permission:delete_movies')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        $genres = Genre::all();

        $actor = null;

        if (request()->actor_id) {
            $actor = Actor::find(request()->actor_id);
        }

        return view('admin.movies.index', compact('actor', 'genres'));

    }// end of index

    public function data()
    {
        $movies = Movie::whenGenreId(request()->genre_id)
            ->whenActorid(request()->actor_id)
            ->whenType(request()->type)
            ->with(['genres'])
            ->withCount(['favoriteByUsers']);

        return DataTables::of($movies)
            ->addColumn('record_select', 'admin.movies.data_table.record_select')
            ->addColumn('poster', function (Movie $movie) {
                return view('admin.movies.data_table.poster', compact('movie'));
            })
            ->addColumn('genres', function (Movie $movie) {
                return view('admin.movies.data_table.genres', compact('movie'));
            })
            ->addColumn('vote', 'admin.movies.data_table.vote')
            ->editColumn('created_at', function (Movie $movie) {
                return $movie->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.movies.data_table.actions')
            ->rawColumns(['record_select', 'vote', 'actions'])
            ->toJson();

    }// end of data

    public function show(Movie $movie)
    {
        $movie->load(['genres', 'actors', 'images']);

        return view('admin.movies.show', compact('movie'));

    }// end of show

    public function destroy(Movie $movie)
    {
        $this->delete($movie);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $movie = Movie::FindOrFail($recordId);
            $this->delete($movie);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Movie $movie)
    {
        $movie->delete();

    }// end of delete

}//end of controller
