<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\GenresGroup;
use Illuminate\Http\Request;

class GenresGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = GenresGroup::all();
        return view('admin.genres_group.index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genres_group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_group = new GenresGroup();
        $new_group->name = $request->name;
        $new_group->bpm = $request->bpm;
        $new_group->description = $request->description;
        $new_group->save();

        return redirect()->back()->withSuccess('Жанр был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GenresGroup $genresGroup)
    {
        $genres = $genresGroup->genres;
        return view('admin.genres_group.show', [
            'genresGroup' => $genresGroup,
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GenresGroup $genresGroup)
    {
        return view('admin.genres_group.edit', [
            'genresGroup' => $genresGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GenresGroup $genresGroup)
    {
        if ($request->name) {
            $genresGroup->name = $request->name;
        }
        if ($request->bpm) {
            $genresGroup->bpm = $request->bpm;
        }
        if ($request->description) {
            $genresGroup->description = $request->description;
        }
        $genresGroup->save();

        return redirect()->back()->withSuccess('Жанр был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GenresGroup $genresGroup)
    {
        $genresGroup->delete();

        return redirect()->back()->withSuccess('Жанр удалён!');
    }
}
