<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volatile extends Model
{
    use HasFactory;

    protected $fillable = [
       'vo_ar',
       'vo_adb',
       'vo_db',
       'vo_daf',
       'vo_method'
    ];

    public function proximate() {
        return $this->hasMany(Proximate::class);
    }
}
