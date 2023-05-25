# CRUD Mechanism For Contact In laravel

## Create ContactAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class ContactAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add one query in ContactAction
- ### get all contacts query
```bash
public static function getAllContact(){
    $contact = Contact::all();
    return $contact;
}
```
## in PrivateController, Update visitContact function
```bash
public function visitContact() {
    $contacts = ContactAction::getAllContact();
    return view('private.contact.visitContact', compact('contacts'));
}
```
## Update tbody tag  in visitContact.blade.php File
```bash
@foreach ($contacts as $contact)
<tr>
    <td>{{ $contact->id }}</td>
    <td>
        @if ($contact->user_id)
        {{ $contact->user->name }}
        @else
        {{ $contact->name }}
        @endif
    </td>
    <td>{{ $contact->phone }}</td>
    <td>{{ Str::substr($contact->description, 0, 8) }}...</td>
    <td>
        @if ($contact->status == 0)
        <a href="{{ route('seeContactDetail',$contact) }}"><p class="label label-danger">مشاهده نشده</p></a>
        @else
        <p class="label label-success">مشاهده شده</p>
        @endif
    </td>
</tr>
@endforeach
```
## in ContactAction, Write checkContactStatus static function
```bash
public static function checkContactStatus(Contact $contact)
{
    if ($contact->status == 0)
    {
        $contact->status = 1;
        $contact->save();
    }
    return back();
}
```
## in PrivateController, Update seeContactDetail function
```bash
public function seeContactDetail(Contact $contact) {
    ContactAction::checkContactStatus($contact);
    return view('private.contact.seeContactDetail', compact('contact'));
}
```
## Update tbody tag  in seeContactDetail.blade.php File
```bash
<form class="form-horizontal">
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام و نام خانوادگی</label>
            <div class="col-lg-10">
                <input value="@if($contact->user_id) {{ $contact->user->name }} @else {{ $contact->name }} @endif" type="text" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">شماره تماس</label>
            <div class="col-lg-10">
                <input value="{{ $contact->phone }}" type="text" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">پست الکترونیک</label>
            <div class="col-lg-10">
                <input value="{{ $contact->email }}" type="text" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت نظر</label>
            <div class="col-lg-10">
                <select disabled name="status" class="form-control" style="height: 40px">
                    <option value="0" @if($contact->status == 0) selected @endif>دیده نشده</option>
                    <option value="1" @if($contact->status == 1) selected @endif>دیده شده</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">متن ارسالی کاربر</label>
            <div class="col-lg-10">
                <textarea disabled name="description" class="form-control">{{ $contact->description }}</textarea>
            </div>
        </div>
    </fieldset>
</form>
```
