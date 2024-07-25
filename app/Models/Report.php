<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'principal',
        'address',
        'attention',
        'reff_order',
        'consignment',
        'weight',
        'date_recieve',
        'date_reported',
        'analisa_id'
    ];

    public function analisa() {
        return $this->belongsTo(Analisa::class);
    }
}
