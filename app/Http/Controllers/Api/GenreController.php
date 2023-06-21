<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\GenresGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\GenreResource;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', [
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->genre_group_id = $request->group;
        $genre->save();

        return redirect()->back()->withSuccess('Поджанр был успешно добавлен!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = GenresGroup::all();
        return view('admin.genre.create', [
            'groups' => $groups
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
