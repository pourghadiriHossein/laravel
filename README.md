# Show All User on Private Side and Create Add User Mechanism

<ol>
<br><li>Create Actions Folder in App Folder</li>
<br><li>Create UserAction file then Write Starter Structure
<pre>

    <?php

    namespace App\Actions;

    class UserAction {
        //Query Part

        //Tools Part

        //Edit Part

        //necessary function

    }
</pre>
</li>
<br><li>Write Query All For User in UserAction
<pre>

    public static function getAllUser(){
        $users = User::all();
        return $users;
    }
</pre>
</li>
<br><li>Update VisitUser Function
<pre>

    public function visitUser() {
        $users = UserAction::getAllUser();
        return view('private.user.visitUser', compact('users'));
    }
</pre>
</li>
<br><li>Write Convert Role Name From English To Farsi In UserAction
<pre>

    public static function convertRoleNameFormEnToFa($roleName){
        switch($roleName){
            case 'admin':
                return 'مدیر';
            case 'user':
                return 'کاربر';
        }
    }
</pre>
</li>
<br><li>Update Visit User Blade
<pre>

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
</pre>
</li>
<br><li>Create RoleAction file then Write Starter Structure
<pre>

    <?php

    namespace App\Actions;

    class RoleAction {
        //Query Part

        //Tools Part

        //Edit Part

        //necessary function

    }
</pre>
</li>
<br><li>Write Query All For Role in RoleAction
<pre>

    public static function getAllRole(){
        $roles = Role::all();
        return $roles;
    }
</pre>
</li>
<br><li>Update addUser Function
<pre>

    public function addUser() {
        $roles = RoleAction::getAllRole();
        return view('private.user.addUser', compact('roles'));
    }
</pre>
</li>
<br><li>Update Add User Balde
<pre>

    <select name="role" class="form-control" style="height: 40px">
        @foreach ($roles as $role)
        <option value="{{ $role->id }}">
            {{ App\Actions\UserAction::convertRoleNameFormEnToFa($role->name) }}
        </option>
        @endforeach
    </select>
</pre>
</li>
<br><li>Create AddUserRequest
<pre>
php artisan make:request AddUserRequest
</pre>
</li>
<br><li>Write Request Validation With Customize Message
<ul>
<br><li>Set Rules
<pre>
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
</pre>
</li>
<br><li>Set Message
<pre>
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
</pre>
</li>
</ul>
</li>
<br><li>Create addUser Function in UserAction
<pre>

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
</pre>
<br><li>Update postAddUser Function
<pre>

    $action = UserAction::addUser($request);
    if ($action['phone'] == 1)
        return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
    if ($action['email'] == 1)
        return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
    return redirect()->route('visitUser');
</pre>
</li>
</ol>


