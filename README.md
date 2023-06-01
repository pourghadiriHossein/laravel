# Complete Login Process

## Add two Function to UserAction
```bash
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
```
```bash
public static function logout()
{
    Auth::logout();
    return back();
}
```
## Add two Route in web.php File for login process
```bash
Route::post('login',[PublicController::class, 'postLogin'])->name('postLogin');
Route::get('logout',[PublicController::class, 'logout'])->name('logout');
```
## Create LoginRequest
- ### Command
```bash
php artisan make:request LoginRequest
```
- ### Update LoginRequest File
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
        'phone' => 'required|digits_between:11,14',
        'password' => 'required|min:3|max:100',
    ];
}
```
## In PublicController
- ### Add postLogin function
```bash
public function postLogin(LoginRequest $request) {
    $report = UserAction::login($request);
    switch($report)
    {
        case $report['UserNotFound'] == 1:
            return redirect()->back()->with('danger', 'کاربر مورد نظر وجود ندارد! لطفا ثبت نام کنید');
        case $report['WrongPassword'] == 1:
            return redirect()->back()->with('danger', 'رمز عبور صحیح نیست');
        case $report['UserLogin'] == 1:
            return redirect(route('visitUser'));
    }
}
```
- ### Add logout function
```bash
public function logout(){
    UserAction::logout();
    return redirect(route('home'));
}
```
## Update login.blade.php File
```bash
<div class="mainBox login">
    @include('include.showError')
    @include('include.validationError')
    <h1>ورود</h1>
    <hr>
    <div class="loginBox">
        <form action="{{ route('postLogin') }}" method="post" autocomplete="on">
            @csrf
            <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
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
## Update Top Menu in publicLayout.blade.php File
```bash
<div class="mainBox topHeader">
    @if (Auth::user())
    <a class="link" href="{{ route('visitUser') }}"><button class="inlineLogin">داشبورد</button></a>
    <a class="link" href="{{ route('logout') }}"><button class="inlineLogin">خروج</button></a>
    @else
    <a class="link" href="{{ route('login') }}"><button class="inlineLogin">ورود</button></a>
    <a class="link" href="{{ route('register') }}"><button class="inlineLogin">ثبت نام</button></a>
    @endif
    <p id="customizeDate" class="inlineDate"></p>
</div>
```

## Update Top Menu in privateLayout.blade.php File
```bash
<span class="username">
    @if (Auth::user())
    {{ Auth::user()->name }}
    @endif
    <b class="caret"></b>
    <ul class="dropdown-menu extended logout">
        <div class="log-arrow-up"></div>
        <p></p>
        <li><a href="{{ route('logout') }}"><i class="icon-eject"></i> خروج</a></li>
    </ul>
</span>
```


