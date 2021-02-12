<?php

namespace App\Http\Controllers;

use App\QueryFilters\RolePermissionFilter;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index(RolePermissionFilter $filter)
    {
        $roles = Role::all();
        $selected_role = Role::with('permissions')->filter($filter)->first();
        $selected_permissions = $selected_role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();
        return view('role-permission', compact('roles', 'permissions', 'selected_permissions'));
    }
    /**
     * @param Request $request
     */
    public function roleAssign(Request $request)
    {
        try {
            $role = Role::findById($request->role);
            $role->syncPermissions(array_keys($request->permissions));
            \Toastr::success('Role assign successfully.', '', ["progressBar"=> true,"closeButton"=> true,]);
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            \Toastr::error('Something went to wrong.', '', ["progressBar"=> true,"closeButton"=> true,]);
        }
        return back();
    }
}
