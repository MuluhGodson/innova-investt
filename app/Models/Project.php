<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;

    public $asYouType = true;

    protected $fillable = [
        'name', 'description', 'intro_video', 'image', 'share_rate', 'total_shares', 'min_shares', 'max_shares', 'min_profit', 'profit_duration', 'project_url',
    ];

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

     public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function shares() {
        return $this->hasOne(ProjectShares::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function toSearchableArray() {
        return $this->toArray();
    }
}
