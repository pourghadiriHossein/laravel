# Show All User on Private Side and Create Add User Mechanism In Laravel

## Create Actions Folder in App Folder

## Create UserAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class UserAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Write Query All For User in UserAction
```bash
public static function getAllUser(){
    $users = User::all();
    return $users;
}
```

## Update VisitUser Function
```bash
public function visitUser() {
    $users = UserAction::getAllUser();
    return view('private.user.visitUser', compact('users'));
}
```

## Write Convert Role Name From English To Farsi In UserAction
```bash
public static function convertRoleNameFormEnToFa($roleName){
    switch($roleName){
        case 'admin':
            return 'مدیر';
        case 'user':
            return 'کاربر';
    }
}
```

## Update Visit User Blade
```bash
@foreach ($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ $user->email }}</td>
    <td>
        @if ($user->roles[0]->name)
        <p class="label label-default" style="background-color: gold">
        {{ App\Actions\UserAction::convertRoleNameFormEnToFa($user->roles[0]->name) }}
        </p>
        @else
        <p class="label label-default" style="background-color: silver">
        {{ App\Actions\UserAction::convertRoleNameFormEnToFa($user->roles[0]->name) }}
        </p>
        @endif
    </td>
    <td>
        @if ($user->status == 1)
        <p class="label label-success" style="width: 250px">فعال</p>
        @else
        <p class="label label-danger" style="width: 250px">غیر فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-warning" href="{{ route('updateUser',$user) }}">ویرایش</a>
    </td>
</tr>
@endforeach
```

## Create RoleAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class RoleAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```

## Write Query All For Role in RoleAction
```bash
public static function getAllRole(){
    $roles = Role::all();
    return $roles;
}
```

## Update addUser Function
```bash
public function addUser() {
    $roles = RoleAction::getAllRole();
    return view('private.user.addUser', compact('roles'));
}
```

## Update Add User Balde
```bash
<select name="role" class="form-control" style="height: 40px">
    @foreach ($roles as $role)
    <option value="{{ $role->id }}">
        {{ App\Actions\UserAction::convertRoleNameFormEnToFa($role->name) }}
    </option>
    @endforeach
</select>
```

## Create AddUserRequest
```bash
php artisan make:request AddUserRequest
```

## Write Request Validation With Customize Message
```bash
public function rules()
{
    return [
        'name' => 'required|min:3|max:100',
        'phone' => 'required|digits_between:11,14',
        'email' => 'required|email',
        'password' => ['required', 'max:100',
        Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
        'status' => 'required|digits_between:0,1',
        'role' =>'required|digits_between:1,2'
    ];
}
```
```bash
public function messages()
{
    return [
        'name.required' => 'نام و نام خانوادگی خود را وارد کنید',
        'name.min' => 'نام و نام خانوادگی حداقل باید 3 حرف باشد',
        'name.max' => 'نام و نام خانوادگی حداکثر می تواند 100 حرف باشد',
        'phone.required' => 'شماره تماس خود را وارد کنید',
        'phone.digits_between' => 'شماره تماس شما نمی تواند غیر عدد بوده و کمتر از 11 رقم و بیشتر از 14 رقم باشد',
        'email.required' => 'پست الکترونیک خود را وارد کنید',
        'email.email' => 'یک پست الکترونیک معتبر وارد کنید',
        'password.required' => 'رمز عبور خود را وارد کنید',
        'password.min' => 'رمز عبور شما نمی تواند کمتر از 4 کاراکتر باشد',
        'password.max' => 'رمز عبور شما نمی تواند بیشتر از 100 کاراکتر باشد',
        'status.required' => 'وضعیت باید وارد شود',
        'status.digits_between' => 'وضعیت نمی تواند خارج از محدوده مجاز باشد',
        'role.required' => 'نقش باید وارد شود',
        'role.digits_between' => 'نقش نمی تواند خارج از محدوده مجاز باشد',
    ];
}
```

## Create addUser Function in UserAction
```bash
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
```

## Update postAddUser Function
```bash
$action = UserAction::addUser($request);
if ($action['phone'] == 1)
    return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
if ($action['email'] == 1)
    return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
return redirect()->route('visitUser');
```
