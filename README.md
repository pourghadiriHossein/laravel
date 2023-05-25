# CRUD Mechanism For Comment In laravel

## Create CommentAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class CommentAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add two query in ProductAction
- ### get all comments query
```bash
public static function getAllComment(){
    $comments = Comment::all();
    return $comments;
}
```
- ### get comment query
```bash
public static function getComment($comment_id){
    $comment = Comment::find($comment_id);
    return $comment;
}
```

## in PrivateController, Update visitComment function
```bash
public function visitComment() {
    $comments = CommentAction::getAllComment();
    return view('private.comment.visitComment', compact('comments'));
}
```
## Update tbody tag  in visitComment.blade.php File
```bash
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
    <td><a class="label label-warning" href="{{ route('updateComment',$comment) }}">ویرایش</a></td>
</tr>
@endforeach
```
## in CommentAction, Write checkState static function
```bash
public static function checkState(Comment $comment)
{
    if($comment->state == 0)
    {
        $comment->state = 1;
        $comment->save();
    }
    return back();
}
```
## in PrivateController, Update updateComment function
```bash
public function updateComment(Comment $comment) {
    CommentAction::checkState($comment);
    return view('private.comment.updateComment', compact('comment'));
}
```
## Update form tag in updateComment.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postUpdateComment',$comment->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نظر کاربر</label>
            <div class="col-lg-10">
                <textarea name="description" class="form-control">{{ $comment->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت نظر</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if($comment->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if($comment->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in CommentAction, Write updateComment static function
```bash
public static function updateComment($request, $comment_id)
{
    $updateComment = self::getComment($comment_id);
    $updateComment->description = $request->input('description');
    $updateComment->status = $request->input('status');
    $updateComment->save();
    return back();
}
```
## Create UpdateCommentRequest
- ### Command
```bash
php artisan make:request UpdateCommentRequest
```
- ### Update UpdateCommentRequest File
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
        'description' => 'required|min:3|max:10000',
        'status' => 'digits_between:0,1',
    ];
}
```
## in PrivateController, Update postUpdateComment function
```bash
public function postUpdateComment(UpdateCommentRequest $request, $comment_id) {
    CommentAction::updateComment($request, $comment_id);
    return redirect(route('visitComment'));
}
```


