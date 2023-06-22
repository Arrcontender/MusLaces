<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GenresGroup;
use App\Models\Musician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musicians = Musician::with('genreGroups')->get();
        return view('admin.musician.index', [
            'musicians' => $musicians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = GenresGroup::all();
        return view('admin.musician.create', [
            'groups' => $groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $musician = new Musician();
        $musician->name = $request->name;
        $musician->description = $request->description;
        $musician->img = '/' . $request->img;
        $musician->save();

        $musician->genreGroups()->attach($request->input('groups'));

        return redirect()->back()->withSuccess('Музыкант был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Musician $musician)
    {
        // TODO
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musician $musician)
    {
        // TODO
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musician $musician)
    {
        // TODO
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musician $musician)
    {
        // TODO
    }
}
