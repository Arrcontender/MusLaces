<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'description'
    ];

    public function genreGroups()
    {
        return $this->belongsToMany(
            GenresGroup::class,
            'musicians_to_genre_groups',
            'musician_id'
        );
    }
}
