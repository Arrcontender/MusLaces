<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MusicianResource;
use App\Models\Musician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MusicianResource::collection(Musician::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $musician = Musician::findOrFail($id);
        $musician->load('genreGroups');
        return new MusicianResource($musician);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musician $musician)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musician $musician)
    {
        //
    }
}
