<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Role::class);
        }

        $roles = Role::all()->count();
        return view('dashboard.roles.index', ['roles'=>$roles]);
    }

    public function update()
    {
        
    }
}
