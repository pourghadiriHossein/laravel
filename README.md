# CRUD Mechanism For Tags In lravel

## Create TagAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class TagAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```

## Add two query in TagAction
- ### get all tags query
```bash
public static function getAllTags(){
    $tags = Tag::all();
    return $tags;
}
```
- ### get tag query
```bash
public static function getTag($tag_id){
    $tag = Tag::find($tag_id);
    return $tag;
}
```

## in PrivateController, Update visitTag function
```bash
public function visitTag() {
    $tags = TagAction::getAllTags();
    return view('private.tag.visitTag', compact('tags'));
}
```
## Update tbody tag  in visitTag.blade.php File
```bash
@foreach ($tags as $tag)
<tr>
    <td>{{$tag->id}}</td>
    <td>{{$tag->label}}</td>
    <td>
        @if ($tag->status == 0)
        <p class="label label-danger" style="width: 250px">غیر فعال</p>
        @else
        <p class="label label-success" style="width: 250px">فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-warning" href="{{ route('updateTag',$tag) }}">ویرایش</a>
    </td>
</tr>
@endforeach
```
## Update form tag in addCategory.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postAddTag') }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام تگ</label>
            <div class="col-lg-10">
                <input value="{{old('label')}}" type="text" name="label" class="form-control" placeholder="نام تگ">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت تگ</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" selected>غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in CategoryAction, Write addTag static function
```bash
public static function addTag($request){
    Tag::create($request->all());
    return back();
}
```
## Create AddTagRequest
- ### Command
```bash
php artisan make:request AddTagRequest
```
- ### Update AddTagRequest File
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
        'label' => 'required|min:3|max:100',
        'status' => 'digits_between:0,1',
    ];
}
```

## in PrivateController, Update postAddTag function
```bash
public function postAddTag(AddTagRequest $request) {
    TagAction::addTag($request);
    return redirect(route('visitTag'));
}
```
## in PrivateController, Update updateTag function
```bash
public function updateTag(Tag $tag) {
    return view('private.tag.updateTag', compact('tag'));
}
```
## Update form tag in updateTag.blade.php File  
```bash
<form class="form-horizontal" action="{{ route('postUpdateTag',$tag->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام تگ</label>
            <div class="col-lg-10">
                <input value="{{$tag->label}}" type="text" name="label" class="form-control" placeholder="نام تگ">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت تگ</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if ($tag->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if ($tag->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in CategoryAction, Write updateTag static function
```bash
public static function updateTag($request, $tag_id){
    $updateTag = self::getTag($tag_id);
    $updateTag->label = $request->input('label');
    $updateTag->status = $request->input('status');
    $updateTag->update();
    return back();
}
```
## Create UpdateTagRequest
- ### Command
```bash
php artisan make:request UpdateTagRequest
```
- ### Update UpdateTagRequest File
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
        'label' => 'required|min:3|max:100',
        'status' => 'digits_between:0,1',
    ];
}
## in PrivateController, Update postUpdateTag function
```bash
public function postUpdateTag(UpdateTagRequest $request, $tag_id) {
    TagAction::updateTag($request, $tag_id);
    return redirect(route('visitTag'));
}
```


