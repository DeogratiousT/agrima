<?php

namespace App\Laratables;

class SubCategoriesLaratables
{    
    public static function laratablesAdditionalColumns()
    {
        return ['slug', 'cover_image'];
    }
    
    public static function laratablesCustomCover($subCategory)
    {
        return view('admin.sub-categories.index_cover',['subCategory'=>$subCategory])->render();
    }

    public static function laratablesCustomAction($subCategory)
    {
        return view('admin.sub-categories.index_action',['subCategory'=>$subCategory])->render();
    }
}