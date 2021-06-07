<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Razotajs;

class Dzija extends Model
{
    use HasFactory;
    public function razotajs() { 
        return $this->belongsTo(Razotajs::class);
        }
    
}
