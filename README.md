# Complete Security and Middleware In Project

## AddressAction File
- ### Add getAllUserAddresses function
```bash
public static function getAllUserAddresses($user_id){
    $addresses = Address::where('user_id',$user_id)->get();
    return $addresses;
}
```
- ### Update deleteAddress function
```bash
public static function deleteAddress(Address $Address)
{
    if(Auth::user()->hasRole('admin')){
        $Address->delete();
    }else{
        if($Address->user_id == Auth::id())
            $Address->delete();
    }

    return back();
}
```
## CommentAction File
- ### Add getUserComments function
```bash
public static function getUserComments(){
    $comments = Comment::where('user_id', Auth::id())->get();
    return $comments;
}
```

## OrderAction File
- ### Add getUserComments function
```bash
public static function getUserOrders(){
    $orders = Order::where('user_id',Auth::id())->get();
    return $orders;
}
```

## TransactionAction File
- ### Add getUserComments function
```bash
public static function getUserTransaction(){
    $orders = OrderAction::getUserOrders();
    $order_IDs = [];
    foreach($orders as $order){
        $order_IDs[] = $order->id;
    }
    $transactions = Transaction::whereIn('order_id',$order_IDs)->get();
    return $transactions;
}
```

## UserAction File
- ### Add getUserComments function
```bash
public static function getUserInArray(){
    $users = User::where('id',Auth::id())->get();
    return $users;
}
```
- ### Update dd function
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
    if($user->hasRole('admin')){
        $user->status = $request->input('status');
    }
    $user->save();

    if($user->hasRole('admin')){
        $user->syncRoles(Role::findById($request->input('role')));
    }
    return $uniqueParameter;
}
```
## Create AfterLogin.php middleware
- ### Command
```bash
php artisan make:middleware AfterLogin
```
- ### Update AfterLogin File
```bash
public function handle(Request $request, Closure $next)
{
    if (Auth::user())
        return redirect(route('visitUser'));
    else
        return $next($request);
}
``` 
- ### Add this command to Kernel.php File in App\Http
```bash
after.login' => \App\Http\Middleware\AfterLogin::class,
```

## Update Some Route in web.php File
- ### Public Side
```bash
Route::get('checkout',[PublicController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('checkout',[PublicController::class, 'postCheckout'])->name('postCheckout')->middleware('auth');
```
```bash
Route::get('login',[PublicController::class, 'login'])->name('login')->middleware('after.login');
Route::post('login',[PublicController::class, 'postLogin'])->name('postLogin')->middleware('after.login');
Route::get('logout',[PublicController::class, 'logout'])->name('logout')->middleware('auth');
```
```bash
Route::get('register',[PublicController::class, 'register'])->name('register')->middleware('after.login');
Route::post('register',[PublicController::class, 'postRegister'])->name('postRegister')->middleware('after.login');
```
```bash
Route::post('add-comment/{product}',[PublicController::class, 'postNewComment'])->name('postNewComment')->middleware('auth');
```
```bash
Route::get('gateway/{order_id}',[PublicController::class,'sendForPay'])->name('sendForPay')->middleware('auth');
```
- ### Add this command to private route group
```bash
middleware('auth')
```
## In PrivateController
- ### Update index function
```bash
public function index() {
    if(Auth::guest()){
        return redirect(route('home'));
    }
    return redirect(route('visitUser'));
}
```
- ### Update visitUser function
```bash
public function visitUser() {
    if(Auth::user()->hasRole('admin')){
        $users = UserAction::getAllUser();
    }
    else{
        $users = UserAction::getUserInArray();
    }
    return view('private.user.visitUser', compact('users'));
}
```
- ### Update addUser function
```bash
public function addUser() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $roles = RoleAction::getAllRole();
    return view('private.user.addUser', compact('roles'));
}
```
- ### Update postAddUser function
```bash
public function postAddUser(AddUserRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $action = UserAction::addUser($request);
    if ($action['phone'] == 1)
        return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
    if ($action['email'] == 1)
        return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
    return redirect()->route('visitUser');
}
```
- ### Update postUpdateUser function
```bash
public function postUpdateUser(UpdateUserRequest $request, User $user) {
    if(Auth::user()->hasRole('admin')){
        $action = UserAction::updateUser($request,$user);
    }else{
        $action = UserAction::updateUser($request,Auth::user());
    }
    if ($action['phone'] == 1)
        return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
    if ($action['email'] == 1)
        return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
    return redirect(route('visitUser'));
}
```
- ### Update visitPermission function
```bash
public function visitPermission() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $permissions = PermissionAction::getAllPermission();
    return view('private.permission.visitPermission', compact('permissions'));
}
```
- ### Update addPermission function
```bash
public function addPermission() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.permission.addPermission');
}
```
- ### Update postAddPermission function
```bash
public function postAddPermission(AddPermissionRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    PermissionAction::addPermission($request);
    return redirect(route('visitPermission'));
}
```
- ### Update updatePermission function
```bash
public function updatePermission($permission_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $permission = PermissionAction::getPermission($permission_id);
    return view('private.permission.updatePermission', compact('permission'));
}
```
- ### Update postUpdatePermission function
```bash
public function postUpdatePermission(UpdatePermissionRequest $request, $permission_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    PermissionAction::updatePermission($request, $permission_id);
    return redirect(route('visitPermission'));
}
```
- ### Update deletePermission function
```bash
public function deletePermission($permission_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    PermissionAction::deletePermission($permission_id);
    return redirect(route('visitPermission'));
}
```
- ### Update visitRole function
```bash
public function visitRole() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $roles = RoleAction::getAllRole();
    return view('private.role.visitRole', compact('roles'));
}
```
- ### Update addRole function
```bash
public function addRole() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $permissions = PermissionAction::getAllPermission();
    return view('private.role.addRole', compact('permissions'));
}
```
- ### Update postAddRole function
```bash
public function postAddRole(AddRoleRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RoleAction::addRole($request);
    return redirect(route('visitRole'));
}
```
- ### Update updateRole function
```bash
public function updateRole($role_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $role = RoleAction::getRole($role_id);
    $rolePermissions = RoleAction::getRolePermissions($role_id);
    $permissions = PermissionAction::getAllPermission();
    return view('private.role.updateRole', compact('role', 'rolePermissions', 'permissions'));
}
```
- ### Update postUpdateRole function
```bash
public function postUpdateRole(UpdateRoleRequest $request, $role_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RoleAction::updateRole($request, $role_id);
    return redirect(route('visitRole'));
}
```
- ### Update deleteRole function
```bash
public function deleteRole($role_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RoleAction::deleteRole($role_id);
    return redirect(route('visitRole'));
}
```
- ### Update visitCategory function
```bash
public function visitCategory() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $categories = CategoryAction::getAllCategories();
    return view('private.category.visitCategory', compact('categories'));
}
```
- ### Update addCategory function
```bash
public function addCategory() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $discounts = DiscountAction::getAllDiscounts();
    return view('private.category.addCategory', compact('discounts'));
}
```
- ### Update postAddCategory function
```bash
public function postAddCategory(Request $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    CategoryAction::addCategory($request);
    return redirect()->route('visitCategory');
}
```
- ### Update addParentCategory function
```bash
public function addParentCategory($parent_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $parent = CategoryAction::getCategory($parent_id);
    $discounts = DiscountAction::getAllDiscounts();
    return view('private.category.addParentCategory', compact('parent', 'discounts'));
}
```
- ### Update postAddParentCategory function
```bash
public function postAddParentCategory(Request $request, $parent_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    CategoryAction::addParentCategory($request, $parent_id);
    return redirect(route('visitCategory'));
}
```
- ### Update updateCategory function
```bash
public function updateCategory($category_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $myCategory = CategoryAction::getCategory($category_id);
    $discounts = DiscountAction::getAllDiscounts();
    $categories = CategoryAction::getAllCategories();
    return view('private.category.updateCategory', compact('myCategory', 'discounts', 'categories'));
}
```
- ### Update postUpdateCategory function
```bash
public function postUpdateCategory(Request $request, $category_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    CategoryAction::updateCategory($request, $category_id);
    return redirect(route('visitCategory'));
}
```
- ### Update visitTag function
```bash
public function visitTag() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $tags = TagAction::getAllTags();
    return view('private.tag.visitTag', compact('tags'));
}
```
- ### Update addTag function
```bash
public function addTag() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.tag.addTag');
}
```
- ### Update postAddTag function
```bash
public function postAddTag(AddTagRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    TagAction::addTag($request);
    return redirect(route('visitTag'));
}
```
- ### Update updateTag function
```bash
public function updateTag(Tag $tag) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.tag.updateTag', compact('tag'));
}
```
- ### Update postUpdateTag function
```bash
public function postUpdateTag(UpdateTagRequest $request, $tag_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    TagAction::updateTag($request, $tag_id);
    return redirect(route('visitTag'));
}
```
- ### Update visitDiscount function
```bash
public function visitDiscount() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $discounts = DiscountAction::getAllDiscounts();
    return view('private.discount.visitDiscount', compact('discounts'));
}
```
- ### Update addDiscount function
```bash
public function addDiscount() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.discount.addDiscount');
}
```
- ### Update postAddDiscount function
```bash
public function postAddDiscount(AddDiscountRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    DiscountAction::addDiscount($request);
    return redirect(route('visitDiscount'));
}
```
- ### Update updateDiscount function
```bash
public function updateDiscount(Discount $discount) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.discount.updateDiscount', compact('discount'));
}
```
- ### Update postUpdateDiscount function
```bash
public function postUpdateDiscount(UpdateDiscountRequest $request, $discount_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    DiscountAction::updateDiscount($request, $discount_id);
    return redirect(route('visitDiscount'));
}
```
- ### Update visitProduct function
```bash
public function visitProduct() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $products = ProductAction::getAllProducts();
    return view('private.product.visitProduct', compact('products'));
}
```
- ### Update addProduct function
```bash
public function addProduct() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $discounts = DiscountAction::getAllDiscounts();
    $categories = CategoryAction::getAllCategories();
    $tags = TagAction::getAllTags();
    return view('private.product.addProduct', compact('discounts','categories','tags'));
}
```
- ### Update postAddProduct function
```bash
public function postAddProduct(AddProductRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    ProductAction::addProduct($request);
    return redirect(route('visitProduct'));
}
```
- ### Update updateProduct function
```bash
public function updateProduct(Product $product) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $discounts = DiscountAction::getAllDiscounts();
    $categories = CategoryAction::getAllCategories();
    $tags = TagAction::getAllTags();
    $selectedTag = TagAction::getSelectedTag($product);
    return view('private.product.updateProduct',compact('product', 'discounts','categories','tags','selectedTag'));
}
```
- ### Update postUpdateProduct function
```bash
public function postUpdateProduct(UpdateProductRequest $request, $product_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    ProductAction::updateProduct($request, $product_id);
    return redirect(route('visitProduct'));
}
```
- ### Update deleteProductImage function
```bash
public function deleteProductImage($image_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    ProductAction::deleteProductImage($image_id);
    return redirect(route('visitProduct'));
}
```
- ### Update visitComment function
```bash
public function visitComment() {
    if(Auth::user()->hasRole('admin')){
        $comments = CommentAction::getAllComment();
    }
    else{
        $comments = CommentAction::getUserComments();
    }
    return view('private.comment.visitComment', compact('comments'));
}
```
- ### Update updateComment function
```bash
public function updateComment(Comment $comment) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    CommentAction::checkState($comment);
    return view('private.comment.updateComment', compact('comment'));
}
```
- ### Update postUpdateComment function
```bash
public function postUpdateComment(UpdateCommentRequest $request, $comment_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    CommentAction::updateComment($request, $comment_id);
    return redirect(route('visitComment'));
}
```
- ### Update visitRegion function
```bash
public function visitRegion() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $regions = RCAction::getAllRegions();
    return view('private.RC.visitRegion', compact('regions'));
}
```
- ### Update addRegion function
```bash
public function addRegion() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.RC.addRegion');
}
```
- ### Update postAddRegion function
```bash
public function postAddRegion(AddRegionRequest $request) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RCAction::addRegion($request);
    return redirect(route('visitRegion'));
}
```
- ### Update updateRegion function
```bash
public function updateRegion(Region $region) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.RC.updateRegion', compact('region'));
}
```
- ### Update postUpdateRegion function
```bash
public function postUpdateRegion(UpdateRegionRequest $request, $region_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RCAction::updateRegion($request, $region_id);
    return redirect(route('visitRegion'));
}
```
- ### Update visitCity function
```bash
public function visitCity() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $cities = RCAction::getAllCity();
    return view('private.RC.visitCity', compact('cities'));
}
```
- ### Update addCity function
```bash
public function addCity($region_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.RC.addCity', compact('region_id'));
}
```
- ### Update postAddCity function
```bash
public function postAddCity(AddCityRequest $request, $region_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RCAction::addCity($request, $region_id);
    return redirect(route('visitCity'));
}
```
- ### Update updateCity function
```bash
public function updateCity(City $city) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    return view('private.RC.updateCity', compact('city'));
}
```
- ### Update postUpdateCity function
```bash
public function postUpdateCity(UpdateCityRequest $request, $city_id) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    RCAction::updateCity($request, $city_id);
    return redirect(route('visitCity'));
}
```
- ### Update visitAddress function
```bash
public function visitAddress() {
    if(Auth::user()->hasRole('admin')){
        $addresses = AddressAction::getAllAddresses();
    }else{
        $addresses = AddressAction::getAllUserAddresses(Auth::id());
    }
    return view('private.address.visitAddress', compact('addresses'));
}
```
- ### Update visitOrder function
```bash
public function visitOrder() {
    if(Auth::user()->hasRole('admin')){
        $orders = OrderAction::getAllOrders();
    }else{
        $orders = OrderAction::getUserOrders();
    }
    return view('private.order.visitOrder', compact('orders'));
}
```
- ### Update visitTransaction function
```bash
public function visitTransaction() {
    if(Auth::user()->hasRole('admin')){
        $transactions = TransactionAction::getAllTransaction();
    }else{
        $transactions = TransactionAction::getUserTransaction();
    }
    return view('private.transaction.visitTransaction', compact('transactions'));
}
```
- ### Update visitContact function
```bash
public function visitContact() {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    $contacts = ContactAction::getAllContact();
    return view('private.contact.visitContact', compact('contacts'));
}
```
- ### Update seeContactDetail function
```bash
public function seeContactDetail(Contact $contact) {
    if(!Auth::user()->hasRole('admin')){
        UserAction::logout();
        return redirect(route('home'));
    }
    ContactAction::checkContactStatus($contact);
    return view('private.contact.seeContactDetail', compact('contact'));
}
```
## Update Private Side blade
- ### Update ul tag in privateLayout.blade.php File
```bash
<ul class="sidebar-menu">
    <li @if(Route::currentRouteName() == 'visitUser')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addUser')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateUser')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>کاربرها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitUser') }}" style="color: #f2f2f2">لیست کاربران</a></li>
            @if(Auth::user()->hasRole('admin'))
            <li><a href="{{ route('addUser') }}" style="color: #f2f2f2">افزودن کاربر</a></li>
            @endif
        </ul>
    </li>
    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitPermission')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addPermission')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updatePermission')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'visitRole')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addRole')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateRole')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-ban-circle"></i>
            <span>سطوح دسترسی</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li> <a href="{{ route('visitPermission') }}" style="color: #f2f2f2">مدیریت سطوح دسترسی</a></li>
            <li> <a href="{{ route('addPermission') }}" style="color: #f2f2f2">افزودن سطح دسترسی</a></li>
            <li> <a href="{{ route('visitRole') }}" style="color: #f2f2f2">مدیریت نقش</a></li>
            <li> <a href="{{ route('addRole') }}" style="color: #f2f2f2">افزودن نقش</a></li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitCategory')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addCategory')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateCategory')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addParentCategory')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>دسته بندی ها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitCategory') }}" style="color: #f2f2f2">لیست دسته ها</a></li>
            <li><a href="{{ route('addCategory') }}" style="color: #f2f2f2">افزودن دسته</a></li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitTag')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addTag')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateTag')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-archive"></i>
            <span>تگ ها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitTag') }}" style="color: #f2f2f2">لیست تگ ها</a></li>
            <li><a href="{{ route('addTag') }}" style="color: #f2f2f2">افزودن تگ</a></li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitDiscount')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addDiscount')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateDiscount')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>مدیریت تخفیف</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitDiscount') }}" style="color: #f2f2f2">لیست تخفیف ها</a></li>
            <li><a href="{{ route('addDiscount') }}" style="color: #f2f2f2">افزودن تخفیف</a></li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitProduct')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addProduct')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateProduct')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>محصولات</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitProduct') }}" style="color: #f2f2f2">لیست محصولات</a></li>
            <li><a href="{{ route('addProduct') }}" style="color: #f2f2f2">افزودن محصولات</a></li>
        </ul>
    </li>
    @endif

    <li @if(Route::currentRouteName() == 'visitComment')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateComment')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>نظر ها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitComment') }}" style="color: #f2f2f2">لیست نظر ها</a></li>
        </ul>
    </li>

    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitRegion')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addRegion')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateRegion')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'visitCity')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'addCity')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'updateCity')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>مدیریت شهر و استان</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitRegion') }}" style="color: #f2f2f2">لیست استان ها</a></li>
            <li><a href="{{ route('addRegion') }}" style="color: #f2f2f2">افزودن استان</a></li>
            <li><a href="{{ route('visitCity') }}" style="color: #f2f2f2">لیست شهر</a></li>
        </ul>
    </li>
    @endif

    <li @if(Route::currentRouteName() == 'visitAddress')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>آدرس ها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitAddress') }}" style="color: #f2f2f2">لیست آدرس ها</a></li>
        </ul>
    </li>

    <li @if(Route::currentRouteName() == 'visitOrder')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>فاکتور ها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitOrder') }}" style="color: #f2f2f2">لیست فاکتور ها</a></li>
        </ul>
    </li>

    <li @if(Route::currentRouteName() == 'visitTransaction')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>تراکنش ها</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitTransaction') }}" style="color: #f2f2f2">لیست تراکنش ها</a></li>
        </ul>
    </li>
    @if(Auth::user()->hasRole('admin'))
    <li @if(Route::currentRouteName() == 'visitContact')
            class="sub-menu active"
        @elseif(Route::currentRouteName() == 'seeContactDetail')
            class="sub-menu active"
        @else
            class="sub-menu"
        @endif>
        <a href="javascript:;" class="">
            <i class="icon-user"></i>
            <span>تماس با ما</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub">
            <li><a href="{{ route('visitContact') }}" style="color: #f2f2f2">لیست تماس ها</a></li>
        </ul>
    </li>
    @endif
</ul>
```
- ### Update form tag in updateUser.blade.php File
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
        @if(Auth::user()->hasRole('admin'))
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
        @endif

    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
- ### Update tbody tag in visitComment.blade.php File
```bash
<tbody>
    @foreach ($comments as $comment)
    <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->user->name }}</td>
        <td>{{ $comment->product->label }}</td>
        <td>{{ Str::substr($comment->description, 0, 8) }}...</td>
        <td>
            @if ($comment->status == 0)
            <p class="label label-danger">غیر فعال</p>
            @else
            <p class="label label-success">فعال</p>
            @endif
            @if ($comment->state == 0)
            <p class="label label-danger">مشاهده نشده</p>
            @else
            <p class="label label-success">مشاهده شده</p>
            @endif
        </td>
        @if(Auth::user()->hasRole('admin'))
        <td><a class="label label-warning" href="{{ route('updateComment',$comment) }}">ویرایش</a></td>
        @endif
    </tr>
    @endforeach
</tbody>
```

