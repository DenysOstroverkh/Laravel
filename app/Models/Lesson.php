<?php

namespace App\Models;

use App\Traits\HasComments;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory, SoftDeletes, HasSlug, HasComments;

    protected $fillable = ['unit_id', 'type', 'title', 'subtitle', 'slug', 'opened', 'content', 'priority', 'image', 'preview', 'description', 'duration', 'translations', 'meta'];

    protected $appends = ['attachments'];

    protected $casts = ['translations' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /* ATTRIBUTES */

    public function getTypeAttribute()
    {
        return $this->attributes['type'] ?? 'text';
    }

    public function getAttachmentsAttribute()
    {
        $files = Storage::disk('local')->files("public/lessons/{$this->id}/attachments");
        
        return collect($files)->map(function($file){
            return implode('storage', explode('public', $file, 2));
        });
    }

    public function getPreviewAttribute()
    {
        if($this->type === 'audio') return '/storage/audio/courses/'.$this->unit()->first()->course_id.'/'.$this->attributes['preview'];
        return $this->attributes['preview'];
    }

    /* HELPERS */

    public function getSlugOptions()
    {
        return SlugOptions::create()
                          ->generateSlugsFrom('title')
                          ->saveSlugsTo('slug')
                          ->allowDuplicateSlugs();
    }
}
