<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'display_name', 'description', 
                           'position', 'images', 'rrss', 'type',
                           'link', 'meta'];

    protected $casts = ['images' => 'array', 'rrss' => 'array', 'meta' => 'array'];
}
