<?php

namespace App\Http\Controllers;

use App\QueryFilters\RoleAssignFilter;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class RoleAssignController extends Controller
{
    public function index(RoleAssignFilter $filter)
    {
        $users = User::pluck('name', 'id')->toArray();
        $roles = Role::all();
        $selected_user = User::with('roles')->filter($filter)->first();
        $selected_roles = [];
        if ($selected_user) {
            $selected_roles = $selected_user->roles->pluck('id')->toArray();
        }
        return view('role-assign', compact('users', 'roles', 'selected_roles'));
    }
    /**
     * @param Request $request
     */
    public function roleAssign(Request $request)
    {
        //return array_keys($request->roles);
        $user = User::find($request->user_id);
        $user->syncRoles(array_keys($request->roles));
        try {
            \Toastr::success('Role assign successfully.', '', ["progressBar"=> true,"closeButton"=> true,]);
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            \Toastr::error('Something went to wrong.', '', ["progressBar"=> true,"closeButton"=> true,]);
        }
        return back();
    }
}
