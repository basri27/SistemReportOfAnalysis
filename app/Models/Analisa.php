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
        'lab_sample_id',
        'standard',
        'parameter',
        'kode_sampel',
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

    public function report() {
        return $this->hasMany(Report::class);
    }
}
