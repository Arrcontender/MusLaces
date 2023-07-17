<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenresGroupResource;
use App\Models\GenresGroup;
use Illuminate\Http\Request;

class GenresGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GenresGroupResource::collection(GenresGroup::all());
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
        return new GenresGroupResource(GenresGroup::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GenresGroup $genresGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GenresGroup $genresGroup)
    {
        //
    }
}
