<?php

namespace App\Laratables;

class CommoditiesLaratables
{    
    public static function laratablesAdditionalColumns()
    {
        return ['slug','in_stock'];
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