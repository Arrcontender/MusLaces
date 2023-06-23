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
        $groups = $musician->genreGroups()->get();
        return view('admin.musician.show', [
            'musician' => $musician,
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musician $musician)
    {
        $groups = GenresGroup::all();
        $actualGroups = $musician->genreGroups()->get();
        $actualGroupsNames = [];

        foreach($actualGroups as $group) {
            $actualGroupsNames[] = $group->name;
        }

        return view('admin.musician.edit', [
            'musician' => $musician,
            'actualGroupsNames' => $actualGroupsNames,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musician $musician)
    {
        if ($request->name) {
            $musician->name = $request->name;
        }
        if ($request->input('groups')) {
            $musician->genreGroups()->sync($request->input('groups'));
        }
        if ($request->description) {
            $musician->description = $request->description;
        }
        if ($request->img) {
            $musician->img = '/' . $request->img;
        }
        $musician->save();

        return redirect()->back()->withSuccess('Поджанр был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musician $musician)
    {
        $musician->delete();

        return redirect()->back()->withSuccess('Музыкант удалён!');
    }
}
