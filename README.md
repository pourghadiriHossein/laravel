# CRUD Mechanism For Permissions and Roles In laravel

## Create PermissionAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class PermissionAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add Static Function to Query Part and Edit Part Function in PermissionAction
### Query Part
```bash
public static function getAllPermission() {
    $allPermissions = Permission::all();
    return $allPermissions;
}
```
```bash
public static function getPermission($id) {
    $permission = Permission::find($id);
    return $permission;
}
```
### Edit Part
```bash
public static function addPermission($request)
{
    Permission::create($request->all());
    return back();
}
```
```bash
public static function updatePermission($request, $permission_id)
{
    $updatePermission = self::getPermission($permission_id);
    $updatePermission->name = $request->input('name');
    $updatePermission->guard_name = $request->input('guard_name');
    $updatePermission->update();
    return back();
}
```
```bash
public static function deletePermission($permission_id)
{
    $permission = self::getPermission($permission_id);
    if ($permission) {
        $permission->delete();
        return back();
    }
}
```

## Add Static Function to Query Part and Edit Part Function in RoleAction
### Query Part
```bash
public static function getRole($id) {
    $role = Role::find($id);
    return $role;
}
```
```bash
public static function getRolePermissions($id) {
    $role = self::getRole($id);
    $rolePermissions = $role->permissions()->pluck('name')->toArray();
    return $rolePermissions;
}
```
### Edit Part
```bash
public static function addRole($request)
{
    $newRole = Role::create($request->all());
    $newRole->permissions()->sync($request->input('permissions'));
    return back();
}
```
```bash
public static function updateRole($request, $role_id)
{
    $updateRole = self::getRole($role_id);
    $updateRole->name = $request->input('name');
    $updateRole->guard_name = $request->input('guard_name');
    $updateRole->update();
    $updateRole->Permissions()->sync($request->input('permissions'));
    return back();
}
```
```bash
public static function deleteRole($role_id)
{
    $role = self::getRole($role_id);
    if ($role) {
        $role->delete();
        return back();
    }
}
```
## Create Add Permission Request
### Authorize
``` bash
public function authorize()
{
    return true;
}
```
### Rules
``` bash
public function rules()
{
    return [
        'name' => 'required|min:3|max:100',
        'guard_name' => 'required|min:3|max:100',
    ];
}
```

## Create Update Permission Request
### Authorize
``` bash
public function authorize()
{
    return true;
}
```
### Rules
``` bash
public function rules()
{
    return [
        'name' => 'min:3|max:100',
        'guard_name' => 'min:3|max:100',
    ];
}
```


## Create Add Role Request
### Authorize
``` bash
public function authorize()
{
    return true;
}
```
### Rules
``` bash
public function rules() {
    return [
        'name' => 'required|min:3|max:100',
        'guard_name' => 'required|min:3|max:100',
        'permissions' => 'array',
        'permissions.*' => 'numeric',
    ];
}
```


## Create Update Role Request
### Authorize
``` bash
public function authorize()
{
    return true;
}
```
### Rules
``` bash
public function rules()
{
    return [
        'name' => 'min:3|max:100',
        'guard_name' => 'min:3|max:100',
        'permissions' => 'array',
        'permissions.*' => 'numeric',
    ];
}
```

## Permissions CRUD Function in Private Controller
### Visit Permissions
```bash
public function visitPermission() {
    $permissions = PermissionAction::getAllPermission();
    return view('private.permission.visitPermission', compact('permissions'));
}
```
### Visit Permissions Blade
```bash
@foreach ($permissions as $permission)
<tr>
    <td>{{ $permission->id }}</td>
    <td class="hidden-phone">{{ $permission->name }}</td>
    <td class="hidden-phone">{{ $permission->guard_name }}</td>
    <td>
        <a class="label label-danger" data-toggle="modal"
        href="#myModal{{ $permission->id }}">حذف</a>
        <a class="label label-success"
        href="{{ route('updatePermission',$permission->id) }}">ویرایش</a>
    </td>

    <div class="modal fade" id="myModal{{ $permission->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;
                </button>
                <h4 class="modal-title">حذف دسترسی آزاد</h4>
            </div>
            <div class="modal-body">
                ایا از این عمل اطمینان دارید؟

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-warning" type="button">
                    خیر
                </button>
                <a href="{{ route('deletePermission',$permission->id) }}" class="btn btn-danger" type="button">آری</a>
            </div>
        </div>
    </div>
</tr>
@endforeach
```
### Add Permissions
```bash
public function addPermission() {
    return view('private.permission.addPermission');
}
```
### Add Permissions Blade
```bash
<form class="form-horizontal" action="{{ route('postAddPermission') }}" method="post" data-toggle="validator" id="user-form">
    @csrf
    <div class="form-group">
        <label class="col-lg-2 control-label">نام دسترسی</label>
        <div class="col-lg-10">
            <input value="" type="text" name="name" class="form-control" placeholder="نام دسترسی">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">نوع دسترسی</label>
        <div class="col-lg-10">
            <input value="" type="text" name="guard_name" class="form-control" placeholder="عنوان دسترسی">
        </div>
    </div>
    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
</form>
```
### Post Add Permissions
```bash
public function postAddPermission(AddPermissionRequest $request) {
    PermissionAction::addPermission($request);
    return redirect(route('visitPermission'));
}
```
### Update Permissions
```bash
public function updatePermission($permission_id) {
    $permission = PermissionAction::getPermission($permission_id);
    return view('private.permission.updatePermission', compact('permission'));
}
```
### Update Permissions Blade
```bash
<form class="form-horizontal" action="{{ route('postUpdatePermission',$permission->id) }}" method="post" data-toggle="validator" id="user-form">
    @csrf
    <div class="form-group">
        <label class="col-lg-2 control-label">نام دسترسی</label>
        <div class="col-lg-10">
            <input value="{{ $permission->name }}" type="text" name="name" class="form-control" placeholder="نام دسترسی">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">عنوان دسترسی</label>
        <div class="col-lg-10">
            <input value="{{ $permission->guard_name }}" type="text" name="guard_name" class="form-control" placeholder="عنوان دسترسی">
        </div>
    </div>
    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
</form>
```
### Post Update Permissions
```bash
public function postUpdatePermission(UpdatePermissionRequest $request, $permission_id) {
    PermissionAction::updatePermission($request, $permission_id);
    return redirect(route('visitPermission'));
}
```
### Delete Permissions
```bash
public function deletePermission($permission_id) {
    PermissionAction::deletePermission($permission_id);
    return redirect(route('visitPermission'));
}
```

## Roles CRUD Function in Private Controller
### Visit Roles
```bash
public function visitRole() {
    $roles = RoleAction::getAllRole();
    return view('private.role.visitRole', compact('roles'));
}
```
### Visit Roles Blade
```bash
@foreach ($roles as $role)
<tr>
    <td>{{ $role->id }}</td>
    <td>{{ $role->name }}</td>
    <td>
        @if ($role->permissions)
        <ol>
            @foreach ($role->permissions as $permission)
                <li>{{ $permission->name }}</li>
            @endforeach
        </ol>
        @endif
    </td>
    <td>
        <a class="label label-danger" data-toggle="modal" href="#myModal{{ $role->id }}">حذف</a>
        <a class="label label-success" href="{{ route('updateRole',$role->id) }}">ویرایش</a>
    </td>

    <div class="modal fade" id="myModal{{ $role->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">حذف {{ $role->name }}</h4>
                </div>
                <div class="modal-body">
                    ایا از این عمل اطمینان دارید؟

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-warning" type="button">
                        خیر
                    </button>
                    <a href="{{ route('deleteRole',$role->id) }}" class="btn btn-danger" type="button">آری</a>
                </div>
            </div>
        </div>
    </div>
</tr>
@endforeach
```
### Add Roles
```bash
public function addRole() {
    $permissions = PermissionAction::getAllPermission();
    return view('private.role.addRole', compact('permissions'));
}
```
### Add Roles Blade
```bash
<form class="form-horizontal" action="{{ route('postAddRole') }}" method="post" data-toggle="validator" id="user-form">
    @csrf
    <div class="form-group">
        <label class="col-lg-2 control-label">نام نقش</label>
        <div class="col-lg-10">
            <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="نام نقش">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">شرح نقش</label>
        <div class="col-lg-10">
            <input value="{{ old('guard_name') }}" type="text" name="guard_name" class="form-control" placeholder="شرح نقش">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">سطوح دسترسی</label>
        <div class="col-lg-10">
            @foreach ($permissions as $permission)
            <label class="access_lvl">
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}
            </label><br/>
            @endforeach
        </div>
    </div>
    <input type="submit" class="finish btn btn-success" value="ذخیره"/>
</form>
```
### Post Add Roles
```bash
public function postAddRole(AddRoleRequest $request) {
    RoleAction::addRole($request);
    return redirect(route('visitRole'));
}
```
### Update Roles
```bash
public function updateRole($role_id) {
    $role = RoleAction::getRole($role_id);
    $rolePermissions = RoleAction::getRolePermissions($role_id);
    $permissions = PermissionAction::getAllPermission();
    return view('private.role.updateRole', compact('role', 'rolePermissions', 'permissions'));
}
```
### Update Roles Blade
```bash
<form class="form-horizontal" action="{{ route('postUpdateRole',$role->id) }}" method="post" data-toggle="validator" id="user-form">
  <div class="form-group">
      @csrf
      <label class="col-lg-2 control-label">نام نقش</label>
      <div class="col-lg-10">
          <input value="{{ $role->name }}" type="text" name="name"
                 class="form-control" placeholder="نام نقش">
      </div>
  </div>
  <div class="form-group">
      <label class="col-lg-2 control-label">شرح نقش</label>
      <div class="col-lg-10">
          <input value="{{ $role->guard_name }}" type="text" name="guard_name"
                 class="form-control" placeholder="شرح نقش">
      </div>
  </div>
  <div class="form-group">
      <label class="col-lg-2 control-label">سطوح دسترسی</label>
      <div class="col-lg-10">
          @foreach($permissions as $permission)
              <label class="access_lvl">
                  <input type="checkbox" name="permissions[]"
                         @if(in_array($permission->name,$rolePermissions)) checked @endif
                         value="{{$permission->id}}"> {{$permission->name}}
              </label>
              <br/>
          @endforeach
      </div>
  </div>
  <input type="submit" class="finish btn btn-success" value="ذخیره"/>
</form>
```
### Post Update Roles
```bash
public function postUpdateRole(UpdateRoleRequest $request, $role_id) {
    RoleAction::updateRole($request, $role_id);
    return redirect(route('visitRole'));
}
```
### Delete Roles
```bash
public function deleteRole($role_id) {
    RoleAction::deleteRole($role_id);
    return redirect(route('visitRole'));
}
```
