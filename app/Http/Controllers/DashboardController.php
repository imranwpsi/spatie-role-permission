<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        //Role::create(['name' => 'writer']);
        //$permission = Permission::create(['name' => 'edit articles']);

//        $role = Role::findById(1);
//        $permission = Permission::findById(1);
//        $role->givePermissionTo($permission);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('dashboard', compact('roles', 'permissions'));
    }
}
