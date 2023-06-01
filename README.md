# Complete Register Process

## Add one Function to UserAction
```bash
public static function register($request)
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
    $newUser->phone = $request->input('phone');
    $newUser->email = $request->input('email');
    $newUser->password = Hash::make($request->input('password'));
    $newUser->save();
    $newUser->assignRole(Role::findByName('user'));
    Auth::login($newUser,true);
    return $uniqueParameter;
}
```
## Add one Route in web.php File for register process
```bash
Route::post('register',[PublicController::class, 'postRegister'])->name('postRegister');
```
## Create RegisterRequest
- ### Command
```bash
php artisan make:request RegisterRequest
```
- ### Update RegisterRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    return [
        'name' => 'required|min:3|max:100',
        'phone' => 'required|digits_between:11,14',
        'email' => 'required|email',
        'password' => ['required', 'max:100',
        Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
    ];
}
```
## In PublicController
- ### Add postRegister function
```bash
public function postRegister(RegisterRequest $request) {
    $report = UserAction::register($request);
    if ($report['phone'] == 1)
        return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
    if ($report['email'] == 1)
        return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
    return redirect(route('visitUser'));
}
```
## Update register.blade.php File
```bash
<div class="mainBox register">
    @include('include.showError')
    @include('include.validationError')
    <h1>ثبت نام</h1>
    <hr>
    <div class="registerBox">
        <form action="{{ route('postRegister') }}" method="post" autocomplete="on">
            @csrf
            <input type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید">
            <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
            <input type="text" name="email" placeholder="پست الکترونیک خود را وارد کنید">
            <input type="text" name="password" placeholder="رمز عبور خود را وارد کنید">
            <input type="submit" value="ارسال کن">
        </form>
    </div>
    <div class="guideBox">
        <p>فرم آزمایشی پروژه پل استار جهت آموزش بهتر و کاردبری تر با ضاهر مناسب جهت ارتباط گیری بیشتر با مبحث تحصیلی می باشد</p>
        <p>شماره تماس: 34911-013</p>
        <p>آدرس: گیلان - رشت - گلسار - چهار راه اصفهان</p>
        <p>پست الکترونیک: info@poulstar.com</p>
    </div>
</div>
```
