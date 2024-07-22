<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_no',
        'kode',
        'standard',
        'parameter',
        'kode_sammpel',
        'client',
        'kode_seam',
        'kontraktor',
        'status',
        'adl_a',
        'tat',
        'tgl_sampel',
        'astm_id',
        'iso_id',
    ];

    public function astm() {
        return $this->belongsTo(Astm::class);
    }

    public function iso() {
        return $this->belongsTo(Iso::class);
    }
}
