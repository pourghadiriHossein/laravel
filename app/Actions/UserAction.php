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

    public static function updateUser($request, $user)
    {
        $uniqueParameter = ['phone' => 0, 'email' => 0];
        $phone = $request->input('phone');
        $email = $request->input('email');
        if ($request->input('phone') && $request->input('phone') != $user->phone)
        {
            if (self::checkPhone($phone) == true)
            {
                $uniqueParameter['phone'] = 1;
                return $uniqueParameter;
            }
        }
        if ($request->input('email') && $request->input('email') != $user->email)
        {
            if (self::checkEmail($email) == true)
            {
                $uniqueParameter['email'] = 1;
                return $uniqueParameter;
            }
        }
        $user->name = $request->input('name');
        $user->phone = $phone;
        $user->email = $email;
        if ($request->input('password'))
            $user->password = Hash::make($request->input('password'));
        $user->status = $request->input('status');
        $user->save();

        $user->syncRoles(Role::findById($request->input('role')));
        return $uniqueParameter;
    }
    public static function login($request)
    {
        $status = [
            'UserNotFound' => 0,
            'WrongPassword' => 0,
            'UserLogin' => 0,
        ];
        $user = User::where('phone', $request->input('phone'))->first();
        if ($user)
        {
            if(Hash::check($request->input('password'), $user->password))
            {
                $status['UserLogin'] = 1;
                Auth::login($user,true);
            }
            else
                $status['WrongPassword'] = 1;
        }else
            $status['UserNotFound'] = 1;
        return $status;
    }
    
    public static function logout()
    {
        Auth::logout();
        return back();
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
