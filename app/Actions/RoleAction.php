<?php

namespace App\Actions;

use Spatie\Permission\Models\Role;

class RoleAction {
    //Query Part
    public static function getAllRole(){
        $roles = Role::all();
        return $roles;
    }
    public static function getRole($id) {
        $role = Role::find($id);
        return $role;
    }
    public static function getRolePermissions($id) {
        $role = self::getRole($id);
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        return $rolePermissions;
    }
    //Tools Part

    // Edit Part
    public static function addRole($request)
    {
        $newRole = Role::create($request->all());
        $newRole->permissions()->sync($request->input('permissions'));
        return back();
    }

    public static function updateRole($request, $role_id)
    {
        $updateRole = self::getRole($role_id);
        $updateRole->name = $request->input('name');
        $updateRole->guard_name = $request->input('guard_name');
        $updateRole->update();
        $updateRole->Permissions()->sync($request->input('permissions'));
        return back();
    }

    public static function deleteRole($role_id)
    {
        $role = self::getRole($role_id);
        if ($role) {
            $role->delete();
            return back();
        }
    }
}
