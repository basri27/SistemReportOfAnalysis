<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sulfur extends Model
{
    use HasFactory;

    protected $fillable = [
       'su_ar',
       'su_adb',
       'su_db',
       'su_daf',
       'su_method'
    ];

    public function astm() {
        return $this->hasMany(Astm::class);
    }
}
