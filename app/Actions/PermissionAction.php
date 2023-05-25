<?php

namespace App\Actions;

use Spatie\Permission\Models\Permission;

class PermissionAction {
    //Query Part
    public static function getAllPermission() {
        $allPermissions = Permission::all();
        return $allPermissions;
    }
    public static function getPermission($id) {
        $permission = Permission::find($id);
        return $permission;
    }
    //Tools Part

    //Edit Part
    public static function addPermission($request)
    {
        Permission::create($request->all());
        return back();
    }
    public static function updatePermission($request, $permission_id)
    {
        $updatePermission = self::getPermission($permission_id);
        $updatePermission->name = $request->input('name');
        $updatePermission->guard_name = $request->input('guard_name');
        $updatePermission->update();
        return back();
    }
    public static function deletePermission($permission_id)
    {
        $permission = self::getPermission($permission_id);
        if ($permission) {
            $permission->delete();
            return back();
        }
    }
    //necessary function

}
