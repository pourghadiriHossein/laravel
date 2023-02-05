<?php

namespace App\Actions;

use Spatie\Permission\Models\Role;

class RoleAction {
    //Query Part
    public static function getAllRole(){
        $roles = Role::all();
        return $roles;
    }
    // Edit Part
    public static function addRole($request)
    {
        $newRole = Role::create($request->all());
        $newRole->permissions()->sync($request->input('permissions'));
        return back();
    }

    public static function updateRole($request, $role_id)
    {
        $updateRole = Role::find($role_id);
        $updateRole->name = $request->input('name');
        $updateRole->guard_name = $request->input('guard_name');
        $updateRole->update();
        $updateRole->Permissions()->sync($request->input('permissions'));
        return back();
    }

    public static function deleteRole($role_id)
    {
        $role = Role::find($role_id);
        $role->delete();
        return back();
    }
}
