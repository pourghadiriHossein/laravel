<?php

namespace App\Actions;

use Spatie\Permission\Models\Permission;

class PermissionAction {
    //Query Part

    // Edit Part

    //Edit Part
    public static function addPermission($request)
    {
        Permission::create($request->all());
        return back();
    }

    public static function updatePermission($request, $permission_id)
    {
        $updatePermission = Permission::find($permission_id);
        $updatePermission->name = $request->input('name');
        $updatePermission->guard_name = $request->input('guard_name');
        $updatePermission->update();
        return back();
    }

    public static function deletePermission($permission_id)
    {
        $selectedPermission = Permission::find($permission_id);
        $selectedPermission->delete();
        return back();
    }
}
