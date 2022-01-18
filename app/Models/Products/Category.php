<?php

namespace App\Models\Products;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasSlug;
    
    protected $fillable = ['name','slug','cover_image'];

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

    public function subCategories()
    {
        return $this->hasMany('App\Models\Products\SubCategory', 'category_id');
    }

    public function commodities()
    {
        return $this->hasManyThrough(
            'App\Models\Products\Commodity',
            'App\Models\Products\SubCategory',
            'category_id', // Foreign key on the subcategories table...
            'sub_category_id', // Foreign key on the commodities table...
            'id', // Local key on the category table...
            'id' // Local key on the subcategories table...
        );
    }
}
