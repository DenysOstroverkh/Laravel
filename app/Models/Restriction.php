<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restriction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['course_id', 'type', 'value', 'description', 'translations', 'meta'];

    protected $casts = ['translations' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
