<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMisiProgress extends Model
{
    protected $table = 'user_misi_progress';
    protected $fillable = ['user_id', 'misi_harian_id', 'progress', 'selesai', 'tanggal'];

    public function misi()
    {
        return $this->belongsTo(MisiHarian::class, 'misi_harian_id');
    }
}