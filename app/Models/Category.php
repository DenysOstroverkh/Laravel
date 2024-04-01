<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = ['name', 'slug', 'priority', 'image', 'preview', 'description', 'translations', 'meta'];

    protected $casts = ['translations' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /* HELPERS */

    public function getSlugOptions()
    {
        return SlugOptions::create()
                          ->generateSlugsFrom('name')
                          ->saveSlugsTo('slug')
                          ->allowDuplicateSlugs();
    }
}
