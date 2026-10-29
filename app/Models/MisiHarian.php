<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MisiHarian extends Model
{
    protected $table = 'misi_harian';
    protected $fillable = ['kode', 'judul', 'target', 'reward_poin'];
}