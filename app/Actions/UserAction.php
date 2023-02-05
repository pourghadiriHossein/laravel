<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserAction {
    //Query Part
    public static function getAllUser(){
        $users = User::all();
        return $users;
    }
    //Tools Part
    public static function convertRoleNameFormEnToFa($roleName){
        switch($roleName){
            case 'admin':
                return 'مدیر';
            case 'user':
                return 'کاربر';
        }
    }
    //Edit Part
    public static function addUser($request)
    {
        $uniqueParameter = ['phone' => 0, 'email' => 0];
        $phone = $request->input('phone');
        $email = $request->input('email');
        if (self::checkPhone($phone) == true)
        {
            $uniqueParameter['phone'] = 1;
            return $uniqueParameter;
        }
        if (self::checkEmail($email) == true)
        {
            $uniqueParameter['email'] = 1;
            return $uniqueParameter;
        }

        $newUser = new User();

        $newUser->name = $request->input('name');
        $newUser->phone = $phone;
        $newUser->email = $email;
        $newUser->password = Hash::make($request->input('password'));
        $newUser->status = $request->input('status');
        $newUser->save();

        $newUser->syncRoles(Role::findById($request->input('role')));
        return $uniqueParameter;
    }

    public static function updateUser($request, $user_id)
    {
        $uniqueParameter = ['phone' => 0, 'email' => 0];
        $phone = $request->input('phone');
        $email = $request->input('email');
        if ($request->input('phone'))
        {
            if (self::checkPhone($phone) == true)
            {
                $uniqueParameter['phone'] = 1;
                return $uniqueParameter;
            }
        }
        if ($request->input('email'))
        {
            if (self::checkEmail($email) == true)
            {
                $uniqueParameter['email'] = 1;
                return $uniqueParameter;
            }
        }

        $newUser = User::find($user_id);

        if ($request->input('name'))
            $newUser->name = $request->input('name');
        if ($request->input('phone'))
            $newUser->phone = $phone;
        if ($request->input('email'))
            $newUser->email = $email;
        if ($request->input('password'))
            $newUser->password = Hash::make($request->input('password'));
        $newUser->status = $request->input('status');
        $newUser->save();

        $newUser->syncRoles(Role::findById($request->input('role')));
        return $uniqueParameter;
    }

    //necessary function
    private static function checkPhone($phone)
    {
        $check = User::where('phone',$phone)->first();
        if ($check)
            return true;
        else
            return false;
    }

    private static function checkEmail($email)
    {
        $check = User::where('email',$email)->first();
        if ($check)
            return true;
        else
            return false;
    }
}
