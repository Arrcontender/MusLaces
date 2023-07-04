<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'average_check'
    ];

    public function genreGroups()
    {
        return $this->belongsToMany(
            GenresGroup::class,
            'places_to_genre_groups',
            'place_id'
        );
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'places_users',
            'place_id'
        );
    }
}
