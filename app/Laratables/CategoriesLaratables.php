<?php

namespace App\Laratables;

class CategoriesLaratables
{    
    public static function laratablesAdditionalColumns()
    {
        return ['slug', 'cover_image'];
    }
    
    public static function laratablesCustomCover($category)
    {
        return view('admin.categories.index_cover',['category'=>$category])->render();
    }

    public static function laratablesCustomAction($category)
    {
        return view('admin.categories.index_action',['category'=>$category])->render();
    }
}