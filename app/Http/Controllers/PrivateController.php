<?php

namespace App\Http\Controllers;

use App\Actions\AddressAction;
use App\Actions\CategoryAction;
use App\Actions\CommentAction;
use App\Actions\ContactAction;
use App\Actions\DiscountAction;
use App\Actions\OrderAction;
use App\Actions\PermissionAction;
use App\Actions\ProductAction;
use App\Actions\RCAction;
use App\Actions\RoleAction;
use App\Actions\TagAction;
use App\Actions\TransactionAction;
use App\Actions\UserAction;
use App\Http\Requests\AddCityRequest;
use App\Http\Requests\AddDiscountRequest;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddRegionRequest;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\AddTagRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Region;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivateController extends Controller
{
    //index
    public function index() {
        if(Auth::guest()){
            return redirect(route('home'));
        }
        return redirect(route('visitUser'));
    }
    //user
    public function visitUser() {
        if(Auth::user()->hasRole('admin')){
            $users = UserAction::getAllUser();
        }
        else{
            $users = UserAction::getUserInArray();
        }
        return view('private.user.visitUser', compact('users'));
    }

    public function addUser() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $roles = RoleAction::getAllRole();
        return view('private.user.addUser', compact('roles'));
    }

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

    public function updateUser(User $user) {
        $roles = RoleAction::getAllRole();
        return view('private.user.updateUser', compact('roles','user'));
    }

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
    //permission
    public function visitPermission() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $permissions = PermissionAction::getAllPermission();
        return view('private.permission.visitPermission', compact('permissions'));
    }

    public function addPermission() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.permission.addPermission');
    }

    public function postAddPermission(AddPermissionRequest $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        PermissionAction::addPermission($request);
        return redirect(route('visitPermission'));
    }

    public function updatePermission($permission_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $permission = PermissionAction::getPermission($permission_id);
        return view('private.permission.updatePermission', compact('permission'));
    }

    public function postUpdatePermission(UpdatePermissionRequest $request, $permission_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        PermissionAction::updatePermission($request, $permission_id);
        return redirect(route('visitPermission'));
    }

    public function deletePermission($permission_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        PermissionAction::deletePermission($permission_id);
        return redirect(route('visitPermission'));
    }
    //role
    public function visitRole() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $roles = RoleAction::getAllRole();
        return view('private.role.visitRole', compact('roles'));
    }

    public function addRole() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $permissions = PermissionAction::getAllPermission();
        return view('private.role.addRole', compact('permissions'));
    }

    public function postAddRole(AddRoleRequest $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RoleAction::addRole($request);
        return redirect(route('visitRole'));
    }

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

    public function postUpdateRole(UpdateRoleRequest $request, $role_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RoleAction::updateRole($request, $role_id);
        return redirect(route('visitRole'));
    }

    public function deleteRole($role_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RoleAction::deleteRole($role_id);
        return redirect(route('visitRole'));
    }
    //category
    public function visitCategory() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $categories = CategoryAction::getAllCategories();
        return view('private.category.visitCategory', compact('categories'));
    }

    public function addCategory() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $discounts = DiscountAction::getAllDiscounts();
        return view('private.category.addCategory', compact('discounts'));
    }

    public function postAddCategory(Request $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        CategoryAction::addCategory($request);
        return redirect()->route('visitCategory');
    }

    public function addParentCategory($parent_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $parent = CategoryAction::getCategory($parent_id);
        $discounts = DiscountAction::getAllDiscounts();
        return view('private.category.addParentCategory', compact('parent', 'discounts'));
    }

    public function postAddParentCategory(Request $request, $parent_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        CategoryAction::addParentCategory($request, $parent_id);
        return redirect(route('visitCategory'));
    }

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

    public function postUpdateCategory(Request $request, $category_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        CategoryAction::updateCategory($request, $category_id);
        return redirect(route('visitCategory'));
    }
    //tag
    public function visitTag() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $tags = TagAction::getAllTags();
        return view('private.tag.visitTag', compact('tags'));
    }

    public function addTag() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.tag.addTag');
    }

    public function postAddTag(AddTagRequest $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        TagAction::addTag($request);
        return redirect(route('visitTag'));
    }

    public function updateTag(Tag $tag) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.tag.updateTag', compact('tag'));
    }

    public function postUpdateTag(UpdateTagRequest $request, $tag_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        TagAction::updateTag($request, $tag_id);
        return redirect(route('visitTag'));
    }
    //discount
    public function visitDiscount() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $discounts = DiscountAction::getAllDiscounts();
        return view('private.discount.visitDiscount', compact('discounts'));
    }

    public function addDiscount() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.discount.addDiscount');
    }

    public function postAddDiscount(AddDiscountRequest $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        DiscountAction::addDiscount($request);
        return redirect(route('visitDiscount'));
    }

    public function updateDiscount(Discount $discount) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.discount.updateDiscount', compact('discount'));
    }

    public function postUpdateDiscount(UpdateDiscountRequest $request, $discount_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        DiscountAction::updateDiscount($request, $discount_id);
        return redirect(route('visitDiscount'));
    }
    //product
    public function visitProduct() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $products = ProductAction::getAllProducts();
        return view('private.product.visitProduct', compact('products'));
    }

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

    public function postAddProduct(AddProductRequest $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        ProductAction::addProduct($request);
        return redirect(route('visitProduct'));
    }

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

    public function postUpdateProduct(UpdateProductRequest $request, $product_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        ProductAction::updateProduct($request, $product_id);
        return redirect(route('visitProduct'));
    }

    public function deleteProductImage($image_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        ProductAction::deleteProductImage($image_id);
        return redirect(route('visitProduct'));
    }
    //comment
    public function visitComment() {
        if(Auth::user()->hasRole('admin')){
            $comments = CommentAction::getAllComment();
        }
        else{
            $comments = CommentAction::getUserComments();
        }
        return view('private.comment.visitComment', compact('comments'));
    }

    public function updateComment(Comment $comment) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        CommentAction::checkState($comment);
        return view('private.comment.updateComment', compact('comment'));
    }

    public function postUpdateComment(UpdateCommentRequest $request, $comment_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        CommentAction::updateComment($request, $comment_id);
        return redirect(route('visitComment'));
    }
    //region & city
    //region
    public function visitRegion() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $regions = RCAction::getAllRegions();
        return view('private.RC.visitRegion', compact('regions'));
    }

    public function addRegion() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.RC.addRegion');
    }

    public function postAddRegion(AddRegionRequest $request) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RCAction::addRegion($request);
        return redirect(route('visitRegion'));
    }

    public function updateRegion(Region $region) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.RC.updateRegion', compact('region'));
    }

    public function postUpdateRegion(UpdateRegionRequest $request, $region_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RCAction::updateRegion($request, $region_id);
        return redirect(route('visitRegion'));
    }
    //city
    public function visitCity() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $cities = RCAction::getAllCity();
        return view('private.RC.visitCity', compact('cities'));
    }

    public function addCity($region_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.RC.addCity', compact('region_id'));
    }

    public function postAddCity(AddCityRequest $request, $region_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RCAction::addCity($request, $region_id);
        return redirect(route('visitCity'));
    }

    public function updateCity(City $city) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        return view('private.RC.updateCity', compact('city'));
    }

    public function postUpdateCity(UpdateCityRequest $request, $city_id) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        RCAction::updateCity($request, $city_id);
        return redirect(route('visitCity'));
    }
    //address
    public function visitAddress() {
        if(Auth::user()->hasRole('admin')){
            $addresses = AddressAction::getAllAddresses();
        }else{
            $addresses = AddressAction::getAllUserAddresses(Auth::id());
        }
        return view('private.address.visitAddress', compact('addresses'));
    }

    public function deleteAddress(Address $address) {
        AddressAction::deleteAddress($address);
        return redirect(route('visitAddress'));
    }
    //order
    public function visitOrder() {
        if(Auth::user()->hasRole('admin')){
            $orders = OrderAction::getAllOrders();
        }else{
            $orders = OrderAction::getUserOrders();
        }
        return view('private.order.visitOrder', compact('orders'));
    }
    //transaction
    public function visitTransaction() {
        if(Auth::user()->hasRole('admin')){
            $transactions = TransactionAction::getAllTransaction();
        }else{
            $transactions = TransactionAction::getUserTransaction();
        }
        return view('private.transaction.visitTransaction', compact('transactions'));
    }
    //contact
    public function visitContact() {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        $contacts = ContactAction::getAllContact();
        return view('private.contact.visitContact', compact('contacts'));
    }

    public function seeContactDetail(Contact $contact) {
        if(!Auth::user()->hasRole('admin')){
            UserAction::logout();
            return redirect(route('home'));
        }
        ContactAction::checkContactStatus($contact);
        return view('private.contact.seeContactDetail', compact('contact'));
    }
}
