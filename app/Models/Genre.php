<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(GenresGroup::class, 'genre_group_id');
    }

    protected $fillable = [
        'name',
        'description',
    ];
}
