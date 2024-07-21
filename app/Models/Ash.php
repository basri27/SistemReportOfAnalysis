<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ash extends Model
{
    use HasFactory;

    protected $fillable = [
       'ash_ar',
       'ash_adb',
       'ash_db',
       'ash_daf',
       'ash_method'
    ];

    public function proximate() {
        return $this->hasMany(Proximate::class);
    }
}
