<?php

namespace App\Laratables;

class UsersLaratables
{    
    public static function laratablesCustomAction($user)
    {
        return view('admin.users.index_action',['user'=>$user])->render();
    }

    public static function laratablesSearchRoleName($query, $searchValue)
    {
        return $query->orWhere('name', 'like', '%'. $searchValue. '%');
    }
}