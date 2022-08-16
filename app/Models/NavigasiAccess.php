<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigasiAccess extends Model
{
    use HasFactory;

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function navigasiButton() {
        return $this->belongsTo(NavigasiButton::class, 'button_id', 'id');
    }
}
