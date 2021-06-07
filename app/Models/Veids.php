<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Izstradajums;

class Veids extends Model
{
    use HasFactory;
    public function izstradajumi() {
        return $this->hasMany(Izstradajums::class);
    }
}