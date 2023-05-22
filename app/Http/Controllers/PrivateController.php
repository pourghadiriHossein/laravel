<?php

namespace App\Http\Controllers;

use App\Actions\CategoryAction;
use App\Actions\DiscountAction;
use App\Actions\PermissionAction;
use App\Actions\RoleAction;
use App\Actions\UserAction;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdateUserRequest;
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
        return view('private.tag.visitTag');
    }

    public function addTag() {
        return view('private.tag.addTag');
    }

    public function postAddTag() {
        return redirect(route('visitTag'));
    }

    public function updateTag() {
        return view('private.tag.updateTag');
    }

    public function postUpdateTag() {
        return redirect(route('visitTag'));
    }
    //discount
    public function visitDiscount() {
        return view('private.discount.visitDiscount');
    }

    public function addDiscount() {
        return view('private.discount.addDiscount');
    }

    public function postAddDiscount() {
        return redirect(route('visitDiscount'));
    }

    public function updateDiscount() {
        return view('private.discount.updateDiscount');
    }

    public function postUpdateDiscount() {
        return redirect(route('visitDiscount'));
    }
    //product
    public function visitProduct() {
        return view('private.product.visitProduct');
    }

    public function addProduct() {
        return view('private.product.addProduct');
    }

    public function postAddProduct() {
        return redirect(route('visitProduct'));
    }

    public function updateProduct() {
        return view('private.product.updateProduct');
    }

    public function postUpdateProduct() {
        return redirect(route('visitProduct'));
    }

    public function deleteProductImage() {
        return redirect(route('visitProduct'));
    }
    //comment
    public function visitComment() {
        return view('private.comment.visitComment');
    }

    public function updateComment() {
        return view('private.comment.updateComment');
    }

    public function postUpdateComment() {
        return redirect(route('visitComment'));
    }
    //region & city
    //region
    public function visitRegion() {
        return view('private.RC.visitRegion');
    }

    public function addRegion() {
        return view('private.RC.addRegion');
    }

    public function postAddRegion() {
        return redirect(route('visitRegion'));
    }

    public function updateRegion() {
        return view('private.RC.updateRegion');
    }

    public function postUpdateRegion() {
        return redirect(route('visitRegion'));
    }
    //city
    public function visitCity() {
        return view('private.RC.visitCity');
    }

    public function addCity() {
        return view('private.RC.addCity');
    }

    public function postAddCity() {
        return redirect(route('visitCity'));
    }

    public function updateCity() {
        return view('private.RC.updateCity');
    }

    public function postUpdateCity() {
        return redirect(route('visitCity'));
    }
    //address
    public function visitAddress() {
        return view('private.address.visitAddress');
    }

    public function deleteAddress() {
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
