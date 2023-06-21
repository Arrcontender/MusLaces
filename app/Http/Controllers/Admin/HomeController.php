<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\GenresGroup;
use App\Models\Musician;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres_count = Genre::all()->count();
        $genres_groups_count = GenresGroup::all()->count();
        $musicians = Musician::all()->count();
        $users = User::all()->count();

        return view('admin.home.index', [
            'genres_count' => $genres_count,
            'genres_groups_count' => $genres_groups_count,
            'musicians' => $musicians,
            'users' => $users
        ]);
    }
}
