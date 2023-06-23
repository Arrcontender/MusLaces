<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GenresGroup;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::with('genreGroups')->get();
        return view('admin.place.index', [
            'places' => $places
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = GenresGroup::all();
        return view('admin.place.create', [
            'groups' => $groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $place = new Place();
        $place->name = $request->name;
        $place->description = $request->description;
        $place->img = '/' . $request->img;
        $place->average_check = $request->average_check;
        $place->save();
        $place->genreGroups()->attach($request->input('groups'));

        return redirect()->back()->withSuccess('Площадка была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        $groups = $place->genreGroups()->get();
        return view('admin.place.show', [
            'place' => $place,
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $groups = GenresGroup::all();
        $actualGroups = $place->genreGroups()->get();
        $actualGroupsNames = [];

        foreach($actualGroups as $group) {
            $actualGroupsNames[] = $group->name;
        }

        return view('admin.place.edit', [
            'place' => $place,
            'actualGroupsNames' => $actualGroupsNames,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        if ($request->name) {
            $place->name = $request->name;
        }
        if ($request->input('groups')) {
            $place->genreGroups()->sync($request->input('groups'));
        }
        if ($request->description) {
            $place->description = $request->description;
        }
        if ($request->average_check) {
            $place->average_check = $request->average_check;
        }
        if ($request->img) {
            $place->img = '/' . $request->img;
        }
        $place->save();

        return redirect()->back()->withSuccess('Площадка была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->back()->withSuccess('Площадка удалена!');
    }
}
