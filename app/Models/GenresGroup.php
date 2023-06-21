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

    protected $fillable = [
        'name',
        'bpm',
        'description',
    ];
}
