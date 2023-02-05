<?php

namespace App\Http\Controllers;

use App\Actions\RoleAction;
use App\Actions\UserAction;
use App\Http\Requests\AddUserRequest;
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

    public function updateUser() {
        return view('private.user.updateUser');
    }

    public function postUpdateUser() {
        return redirect(route('visitUser'));
    }
    //permission
    public function visitPermission() {
        return view('private.permission.visitPermission');
    }

    public function addPermission() {
        return view('private.permission.addPermission');
    }

    public function postAddPermission() {
        return redirect(route('visitPermission'));
    }

    public function updatePermission() {
        return view('private.permission.updatePermission');
    }

    public function postUpdatePermission() {
        return redirect(route('visitPermission'));
    }

    public function deletePermission() {
        return redirect(route('visitPermission'));
    }
    //role
    public function visitRole() {
        return view('private.role.visitRole');
    }

    public function addRole() {
        return view('private.role.addRole');
    }

    public function postAddRole() {
        return redirect(route('visitRole'));
    }

    public function updateRole() {
        return view('private.role.updateRole');
    }

    public function postUpdateRole() {
        return redirect(route('visitRole'));
    }

    public function deleteRole() {
        return redirect(route('visitRole'));
    }
    //category
    public function visitCategory() {
        return view('private.category.visitCategory');
    }

    public function addCategory() {
        return view('private.category.addCategory');
    }

    public function postAddCategory() {
        return redirect()->route('visitCategory');
    }

    public function addParentCategory() {
        return view('private.category.addParentCategory');
    }

    public function postAddParentCategory() {
        return redirect(route('visitCategory'));
    }

    public function updateCategory() {
        return view('private.category.updateCategory');
    }

    public function postUpdateCategory() {
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
