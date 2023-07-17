<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return new UserResource(User::findOrFail($id)->load('places'));
    }

    /**
     * Store new rate.
     */
    public function storeNewRates(int $user_id, int $place_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        $place = Place::findOrFail($place_id);
        $requestData = [
            'music' => $request->music,
            'vibe' => $request->vibe,
            'drinks' => $request->drinks,
            'cleanness' => $request->cleanness,
            'price' => $request->price,
            ];

        if ($place) {
            $newRate = $user->places()->attach($place_id, $requestData);
            return $newRate;
        } else {
            return response('Не существует такого плейса', 404)->send();
        }

    }

    /**
     * Edit rates.
     */
    public function editRates(int $user_id, int $place_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        $place = Place::findOrFail($place_id);

        $requestData = [
            'music' => $request->music ?? null,
            'vibe' => $request->vibe ?? null,
            'drinks' => $request->drinks ?? null,
            'cleanness' => $request->cleanness ?? null,
            'price' => $request->price ?? null,
        ];

        if ($place) {
            $newRate = $user->places()->updateExistingPivot($place_id, $requestData);
            return $newRate;
        } else {
            return response('Не существует такого плейса', 404)->send();
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
