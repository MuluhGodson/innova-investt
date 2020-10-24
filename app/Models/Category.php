<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;
     public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
     public function getRouteKeyName()
    {
        return 'slug';
    }

     protected $fillable = ['name', 'description', 'cover_photo'];

     public function projects() {
    	return $this->belongsToMany(Project::class)->withTimestamps();
    }
     public function toSearchableArray() {
        return $this->toArray();
    }
}
