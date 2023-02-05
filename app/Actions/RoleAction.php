<?php

namespace App\Actions;

use Spatie\Permission\Models\Role;

class RoleAction {
    //Query Part
    public static function getAllRole(){
        $roles = Role::all();
        return $roles;
    }
    //Tools Part

    // Edit Part
    
}
