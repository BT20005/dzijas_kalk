<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Veids;

class Izstradajums extends Model
{
    use HasFactory;
    public function veidi() { // FK relationship
        return $this->belongsTo(Veids::class);
        }
}
