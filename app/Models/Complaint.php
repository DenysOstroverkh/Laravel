<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['type', 'name', 'description', 'names', 'descriptions', 'color', 'meta'];

    protected $casts = ['names' => 'array', 'descriptions' => 'array', 'meta' => 'array'];
}
