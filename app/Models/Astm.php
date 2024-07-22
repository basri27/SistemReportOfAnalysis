<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astm extends Model
{
    use HasFactory;

    protected $fillable = [
        'proximate_id',
        'gross_id',
        'sulfur_id',
        'total_moist_id'
    ];

    public function proximate() {
        return $this->belongsTo(Proximate::class);
    }

    public function gross() {
        return $this->belongsTo(Gross::class);
    }

    public function sulfur() {
        return $this->belongsTo(Sulfur::class);
    }

    public function totalMoist() {
        return $this->belongsTo(TotalMoist::class);
    }

    public function analisa() {
        return $this->hasMany(Analisa::class);
    }
}
