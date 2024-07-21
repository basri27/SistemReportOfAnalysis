<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iso extends Model
{
    use HasFactory;

    protected $fillable = [
        'sulfur',
        'ash',
        'method_sulfur',
        'method_ash'
    ];
}
