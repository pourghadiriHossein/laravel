<?php

namespace App\Http\Controllers;

use App\Actions\AddressAction;
use App\Actions\CategoryAction;
use App\Actions\CommentAction;
use App\Actions\DiscountAction;
use App\Actions\PermissionAction;
use App\Actions\ProductAction;
use App\Actions\RCAction;
use App\Actions\RoleAction;
use App\Actions\TagAction;
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
use App\Models\Discount;
use App\Models\Product;
use App\Models\Region;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PrivateController extends Controller
{
    //index
    public function index() {
        return redirect(route('visitUser'));
    }
    //user
    public function visitUser() {
        $users = UserAction::getAllUser();
        return view('private.user.visitUser', compact('users'));
    }

    public function addUser() {
        $roles = RoleAction::getAllRole();
        return view('private.user.addUser', compact('roles'));
    }

    public function postAddUser(AddUserRequest $request) {
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
        $action = UserAction::updateUser($request,$user);
        if ($action['phone'] == 1)
            return redirect()->back()->with('danger','کاربری با این شماره تماس وجود دارد');
        if ($action['email'] == 1)
            return redirect()->back()->with('danger', 'کاربری با این ایمیل وجود دارد');
        return redirect(route('visitUser'));
    }
    //permission
    public function visitPermission() {
        $permissions = PermissionAction::getAllPermission();
        return view('private.permission.visitPermission', compact('permissions'));
    }

    public function addPermission() {
        return view('private.permission.addPermission');
    }

    public function postAddPermission(AddPermissionRequest $request) {
        PermissionAction::addPermission($request);
        return redirect(route('visitPermission'));
    }

    public function updatePermission($permission_id) {
        $permission = PermissionAction::getPermission($permission_id);
        return view('private.permission.updatePermission', compact('permission'));
    }

    public function postUpdatePermission(UpdatePermissionRequest $request, $permission_id) {
        PermissionAction::updatePermission($request, $permission_id);
        return redirect(route('visitPermission'));
    }

    public function deletePermission($permission_id) {
        PermissionAction::deletePermission($permission_id);
        return redirect(route('visitPermission'));
    }
    //role
    public function visitRole() {
        $roles = RoleAction::getAllRole();
        return view('private.role.visitRole', compact('roles'));
    }

    public function addRole() {
        $permissions = PermissionAction::getAllPermission();
        return view('private.role.addRole', compact('permissions'));
    }

    public function postAddRole(AddRoleRequest $request) {
        RoleAction::addRole($request);
        return redirect(route('visitRole'));
    }

    public function updateRole($role_id) {
        $role = RoleAction::getRole($role_id);
        $rolePermissions = RoleAction::getRolePermissions($role_id);
        $permissions = PermissionAction::getAllPermission();
        return view('private.role.updateRole', compact('role', 'rolePermissions', 'permissions'));
    }

    public function postUpdateRole(UpdateRoleRequest $request, $role_id) {
        RoleAction::updateRole($request, $role_id);
        return redirect(route('visitRole'));
    }

    public function deleteRole($role_id) {
        RoleAction::deleteRole($role_id);
        return redirect(route('visitRole'));
    }
    //category
    public function visitCategory() {
        $categories = CategoryAction::getAllCategories();
        return view('private.category.visitCategory', compact('categories'));
    }

    public function addCategory() {
        $discounts = DiscountAction::getAllDiscounts();
        return view('private.category.addCategory', compact('discounts'));
    }

    public function postAddCategory(Request $request) {
        CategoryAction::addCategory($request);
        return redirect()->route('visitCategory');
    }

    public function addParentCategory($parent_id) {
        $parent = CategoryAction::getCategory($parent_id);
        $discounts = DiscountAction::getAllDiscounts();
        return view('private.category.addParentCategory', compact('parent', 'discounts'));
    }

    public function postAddParentCategory(Request $request, $parent_id) {
        CategoryAction::addParentCategory($request, $parent_id);
        return redirect(route('visitCategory'));
    }

    public function updateCategory($category_id) {
        $myCategory = CategoryAction::getCategory($category_id);
        $discounts = DiscountAction::getAllDiscounts();
        $categories = CategoryAction::getAllCategories();
        return view('private.category.updateCategory', compact('myCategory', 'discounts', 'categories'));
    }

    public function postUpdateCategory(Request $request, $category_id) {
        CategoryAction::updateCategory($request, $category_id);
        return redirect(route('visitCategory'));
    }
    //tag
    public function visitTag() {
        $tags = TagAction::getAllTags();
        return view('private.tag.visitTag', compact('tags'));
    }

    public function addTag() {
        return view('private.tag.addTag');
    }

    public function postAddTag(AddTagRequest $request) {
        TagAction::addTag($request);
        return redirect(route('visitTag'));
    }

    public function updateTag(Tag $tag) {
        return view('private.tag.updateTag', compact('tag'));
    }

    public function postUpdateTag(UpdateTagRequest $request, $tag_id) {
        TagAction::updateTag($request, $tag_id);
        return redirect(route('visitTag'));
    }
    //discount
    public function visitDiscount() {
        $discounts = DiscountAction::getAllDiscounts();
        return view('private.discount.visitDiscount', compact('discounts'));
    }

    public function addDiscount() {
        return view('private.discount.addDiscount');
    }

    public function postAddDiscount(AddDiscountRequest $request) {
        DiscountAction::addDiscount($request);
        return redirect(route('visitDiscount'));
    }

    public function updateDiscount(Discount $discount) {
        return view('private.discount.updateDiscount', compact('discount'));
    }

    public function postUpdateDiscount(UpdateDiscountRequest $request, $discount_id) {
        DiscountAction::updateDiscount($request, $discount_id);
        return redirect(route('visitDiscount'));
    }
    //product
    public function visitProduct() {
        $products = ProductAction::getAllProducts();
        return view('private.product.visitProduct', compact('products'));
    }

    public function addProduct() {
        $discounts = DiscountAction::getAllDiscounts();
        $categories = CategoryAction::getAllCategories();
        $tags = TagAction::getAllTags();
        return view('private.product.addProduct', compact('discounts','categories','tags'));
    }

    public function postAddProduct(AddProductRequest $request) {
        ProductAction::addProduct($request);
        return redirect(route('visitProduct'));
    }

    public function updateProduct(Product $product) {
        $discounts = DiscountAction::getAllDiscounts();
        $categories = CategoryAction::getAllCategories();
        $tags = TagAction::getAllTags();
        $selectedTag = TagAction::getSelectedTag($product);
        return view('private.product.updateProduct',compact('product', 'discounts','categories','tags','selectedTag'));
    }

    public function postUpdateProduct(UpdateProductRequest $request, $product_id) {
        ProductAction::updateProduct($request, $product_id);
        return redirect(route('visitProduct'));
    }

    public function deleteProductImage($image_id) {
        ProductAction::deleteProductImage($image_id);
        return redirect(route('visitProduct'));
    }
    //comment
    public function visitComment() {
        $comments = CommentAction::getAllComment();
        return view('private.comment.visitComment', compact('comments'));
    }

    public function updateComment(Comment $comment) {
        CommentAction::checkState($comment);
        return view('private.comment.updateComment', compact('comment'));
    }

    public function postUpdateComment(UpdateCommentRequest $request, $comment_id) {
        CommentAction::updateComment($request, $comment_id);
        return redirect(route('visitComment'));
    }
    //region & city
    //region
    public function visitRegion() {
        $regions = RCAction::getAllRegions();
        return view('private.RC.visitRegion', compact('regions'));
    }

    public function addRegion() {
        return view('private.RC.addRegion');
    }

    public function postAddRegion(AddRegionRequest $request) {
        RCAction::addRegion($request);
        return redirect(route('visitRegion'));
    }

    public function updateRegion(Region $region) {
        return view('private.RC.updateRegion', compact('region'));
    }

    public function postUpdateRegion(UpdateRegionRequest $request, $region_id) {
        RCAction::updateRegion($request, $region_id);
        return redirect(route('visitRegion'));
    }
    //city
    public function visitCity() {
        $cities = RCAction::getAllCity();
        return view('private.RC.visitCity', compact('cities'));
    }

    public function addCity($region_id) {
        return view('private.RC.addCity', compact('region_id'));
    }

    public function postAddCity(AddCityRequest $request, $region_id) {
        RCAction::addCity($request, $region_id);
        return redirect(route('visitCity'));
    }

    public function updateCity(City $city) {
        return view('private.RC.updateCity', compact('city'));
    }

    public function postUpdateCity(UpdateCityRequest $request, $city_id) {
        RCAction::updateCity($request, $city_id);
        return redirect(route('visitCity'));
    }
    //address
    public function visitAddress() {
        $addresses = AddressAction::getAllAddresses();
        return view('private.address.visitAddress', compact('addresses'));
    }

    public function deleteAddress(Address $address) {
        AddressAction::deleteAddress($address);
        return redirect(route('visitAddress'));
    }
    //order
    public function visitOrder() {
        return view('private.order.visitOrder');
    }
    //transaction
    public function visitTransaction() {
        return view('private.transaction.visitTransaction');
    }
    //contact
    public function visitContact() {
        return view('private.contact.visitContact');
    }

    public function seeContactDetail() {
        return view('private.contact.seeContactDetail');
    }
}
