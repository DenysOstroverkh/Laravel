<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id'];

    protected $appends = ['poster'];
    
    protected $hidden = [];
    
    protected $dates = ['start_date'];

    protected $casts = ['meta' => 'array'];

    /* RELATIONS */
    
    /* ATTRIBUTES */

    /* HELPERS */
}