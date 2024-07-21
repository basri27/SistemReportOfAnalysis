<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gross extends Model
{
    use HasFactory;

    protected $fillable = [
       'gr_ar',
       'gr_adb',
       'gr_db',
       'gr_daf',
       'gr_method'
    ];

    public function astm() {
        return $this->hasMany(Astm::class);
    }
}
