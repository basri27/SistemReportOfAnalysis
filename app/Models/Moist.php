<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moist extends Model
{
    use HasFactory;

    protected $fillable = [
       'mo_ar',
       'mo_adb',
       'mo_db',
       'mo_daf',
       'mo_method'
    ];

    public function proximate() {
        return $this->hasMany(Proximate::class);
    }
}
