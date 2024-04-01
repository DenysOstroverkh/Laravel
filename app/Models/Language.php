<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'name', 'flag', 'active', 'translations'];

    protected $casts = ['translations' => 'array'];
}
