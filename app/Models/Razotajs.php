<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dzija;

class Razotajs extends Model
{
    use HasFactory;
    public function dzijas() { // FK relationship
        return $this->hasMany(Dzija::class);
        }
}
