# CRUD Mechanism For Address In laravel

## Create AddressAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class AddressAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add two query in RCAction
- ### get all addresses query
```bash
public static function getAllAddresses(){
    $addresses = Address::all();
    return $addresses;
}
```
## in PrivateController, Update visitAddress function
```bash
public function visitAddress() {
    $addresses = AddressAction::getAllAddresses();
    return view('private.address.visitAddress', compact('addresses'));
}
```
## Update tbody tag  in visitAddress.blade.php File
```bash
@foreach ($addresses as $address)
<tr>
    <td>{{ $address->id }}</td>
    <td>{{ $address->user->name }}</td>
    <td>{{ $address->city->region->label }}</td>
    <td>{{ $address->city->label }}</td>
    <td>{{ $address->detail }}</td>
    <td>
        @if ($address->status == 0)
        <p class="label label-danger" style="width: 250px">غیر فعال</p>
        @else
        <p class="label label-success" style="width: 250px">فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-danger" data-toggle="modal" href="#myModal{{ $address->id }}">حذف</a>
    </td>

    <div class="modal fade" id="myModal{{ $address->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">حذف آدرس</h4>
                </div>
                <div class="modal-body">
                    ایا از این عمل اطمینان دارید؟

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-warning" type="button">
                        خیر
                    </button>
                    <a href="{{ route('deleteAddress',$address) }}" class="btn btn-danger" type="button">آری</a>
                </div>
            </div>
        </div>
    </div>
</tr>
@endforeach
```
## in AddressAction, Write deleteAddress static function
```bash
public static function deleteAddress(Address $Address)
{
    $Address->delete();
    return back();
}
```
## in PrivateController, Update deleteAddress function
```bash
public function deleteAddress(Address $address) {
    AddressAction::deleteAddress($address);
    return redirect(route('visitAddress'));
}
```
