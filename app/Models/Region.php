<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name', 'slug', 'svg_id', 'description', 'cover_image'];

    public function quiz() { return $this->hasOne(Quiz::class); }
}