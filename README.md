# Show User Detail on Private Side and Update User Mechanism In laravel

## Update User Update Controller
```bash
public function updateUser(User $user) {
    $roles = RoleAction::getAllRole();
    return view('private.user.updateUser', compact('roles','user'));
}
```


## Change Update User Blade
```bash
<form class="form-horizontal" action="{{ route('postUpdateUser',$user) }}" method="post" enctype="multipart/form-data">
  @csrf
  <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
      <div class="form-group">
          <label class="col-lg-2 control-label">نام و نام خانوادگی</label>
          <div class="col-lg-10">
              <input value="{{ $user->name }}" type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">شماره تماس</label>
          <div class="col-lg-10">
              <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" placeholder="شماره تماس خود را وارد کنید">
              <div class="help-block with-errors"></div>
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">پست الکترونیک</label>
          <div class="col-lg-10">
              <input value="{{ $user->email }}" type="text" name="email" class="form-control" placeholder="پست الکترونیک خود را وارد کنید">
              <div class="help-block with-errors"></div>
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">رمز عبور</label>
          <div class="col-lg-10">
              <input type="text" name="password" class="form-control" placeholder="رمز عبور خود را وارد کنید">
              <div class="help-block with-errors"></div>
          </div>
      </div>

      <div class="form-group">
          <label class="col-lg-2 control-label">وضعیت کاربر</label>
          <div class="col-lg-10">
              <select name="status" class="form-control" style="height: 40px">
                  <option value="0" @if($user->status == 0) selected @endif>غیر فعال</option>
                  <option value="1" @if($user->status == 1) selected @endif>فعال</option>
              </select>
          </div>
      </div>

      <div class="form-group">
          <label class="col-lg-2 control-label">نقش کاربر</label>
          <div class="col-lg-10">
              <select name="role" class="form-control" style="height: 40px">
                  @foreach ($roles as $role)
                  <option value="{{ $role->id }}" @if($user->roles[0]->id == $role->id) selected @endif>{{ $role->name }}</option>
                  @endforeach
              </select>
          </div>
      </div>
  </fieldset>
  <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```

## Create Update user Request
```bash
php artisan make:request UpdateUserRequest
```

## Change Authorize and Rules
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    if ($this->input('password')) {
        return [
            'name' => 'min:3|max:100',
            'phone' => 'digits_between:11,14',
            'email' => 'email',
            'password' => ['max:100',
            Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'status' => 'digits_between:0,1',
            'role' =>'digits_between:1,2'
        ];
    }
    else {
        return [
            'name' => 'min:3|max:100',
            'phone' => 'digits_between:11,14',
            'email' => 'email',
            'status' => 'digits_between:0,1',
            'role' =>'digits_between:1,2'
        ];
    }
}
```

## Create Update User Action in UserAction
```bash
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
```

## Update postUpdateUser in PrivateController
```bash
public function postUpdateUser(UpdateUserRequest $request, User $user) {
    $action = UserAction::updateUser($request,$user);
    if ($action['phone'] == 1)
        return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
    if ($action['email'] == 1)
        return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
    return redirect(route('visitUser'));
}
```
