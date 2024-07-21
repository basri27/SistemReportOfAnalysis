<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalMoist extends Model
{
    use HasFactory;

    protected $fillable = [
       'tm_ar',
       'tm_adb',
       'tm_db',
       'tm_daf',
       'tm_method'
    ];

    public function astm() {
        return $this->hasMany(Astm::class);
    }
}
