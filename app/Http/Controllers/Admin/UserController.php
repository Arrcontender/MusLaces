<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('places')->get();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $places = $user->places()->get();
        return view('admin.user.show', [
            'places' => $places,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($request->name) {
            $user->name = $request->name;
        }

        if ($request->img) {
            $user->img = '/' . $request->img;
        }
        $user->save();

        return redirect()->back()->withSuccess('Пользователь был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->withSuccess('Пользователь был удален!');
    }
}
