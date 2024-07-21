<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximate extends Model
{
    use HasFactory;

    protected $fillable = [
        'moist_id',
        'volatile_id',
        'carbon_id',
        'ash_id'
    ];

    public function moist() {
        return $this->belongsTo(Moist::class);
    }

    public function volatile() {
        return $this->belongsTo(Volatile::class);
    }

    public function carbon() {
        return $this->belongsTo(Carbon::class);
    }

    public function ash() {
        return $this->belongsTo(Ash::class);
    }

    public function astm() {
        return $this->hasMany(Astm::class);
    }
}
