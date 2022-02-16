<?php

namespace App\Laratables;

class CommoditiesLaratables
{    
    public static function laratablesAdditionalColumns()
    {
        return ['slug','in_stock', 'cover_image'];
    }

    public static function laratablesSubCategoryRelationQuery()
    {
        return function ($query) {
            $query->with('category');
        };
    }

    public static function laratablesCustomCategory($commodity)
    {
        return $commodity->subCategory->category->name;
    }
    
    public static function laratablesCustomCover($commodity)
    {
        return view('admin.commodities.index_cover',['commodity'=>$commodity])->render();
    }

    public static function laratablesCustomAction($commodity)
    {
        return view('admin.commodities.index_action',['commodity'=>$commodity])->render();
    }

    public static function laratablesCustomState($commodity)
    {
        return view('admin.commodities.index_state',['commodity'=>$commodity])->render();
    }

    // public static function laratablesSearchRoleName($query, $searchValue)
    // {
    //     return $query->orWhere('name', 'like', '%'. $searchValue. '%');
    // }
}