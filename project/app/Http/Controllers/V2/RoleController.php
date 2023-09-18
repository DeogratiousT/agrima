<?php

namespace App\Http\Controllers\V2;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\V2\Controller;
use Freshbitsweb\Laratables\Laratables;

class RoleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Role::class);
        }

        $roles = Role::all()->count();
        return view('admin.roles.index', ['roles'=>$roles]);
    }
}
