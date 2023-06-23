<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenresGroup extends Model
{
    use HasFactory;

    protected $table = 'group_genres';

    public function genres()
    {
        return $this->hasMany(Genre::class, 'genre_group_id');
    }

    public function musicians()
    {
        return $this->belongsToMany(
            Musician::class,
            'musicians_to_genre_groups',
            'genres_group_id'
        );
    }

    public function places()
    {
        return $this->belongsToMany(
            Place::class,
            'places_to_genre_groups',
            'genres_group_id'
        );
    }

    protected $fillable = [
        'name',
        'bpm',
        'description',
    ];
}
