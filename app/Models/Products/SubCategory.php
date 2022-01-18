<?php

namespace App\Models\Products;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory, HasSlug;
    
    protected $fillable = ['name','slug', 'category_id', 'cover_image'];

    /**
    * Get the options for generating the slug.
    */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function commodities()
    {
        return $this->hasMany('App\Models\Products\Commodity', 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Products\Category', 'category_id');
    }
}
