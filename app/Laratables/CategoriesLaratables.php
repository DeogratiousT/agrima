<?php

namespace App\Laratables;

class CategoriesLaratables
{    
    public static function laratablesAdditionalColumns()
    {
        return ['slug'];
    }
    
    public static function laratablesCustomAction($category)
    {
        return view('admin.categories.index_action',['category'=>$category])->render();
    }

    // public static function laratablesSearchRoleName($query, $searchValue)
    // {
    //     return $query->orWhere('name', 'like', '%'. $searchValue. '%');
    // }
}