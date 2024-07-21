<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carbon extends Model
{
    use HasFactory;

    protected $fillable = [
       'ca_ar',
       'ca_adb',
       'ca_db',
       'ca_daf',
       'ca_method'
    ];

    public function proximate() {
        return $this->hasMany(Proximate::class);
    }
}
