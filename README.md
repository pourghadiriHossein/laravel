# Complete Add Comment for Product

## Add one Function to CommentAction
```bash
public static function addComment($request, $product_id)
{
    $newComment = new Comment();
    $newComment->user_id = Auth::id();
    $newComment->product_id = $product_id;
    $newComment->description = $request->input('comment');
    $newComment->save();
    return back();
}
```
## Add one Route in web.php File for register process
```bash
Route::post('add-comment/{product}',[PublicController::class, 'postNewComment'])->name('postNewComment');
```
## Create AddCommentRequest
- ### Command
```bash
php artisan make:request AddCommentRequest
```
- ### Update AddCommentRequest File
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
        'comment' => 'required|min:3|max:10000',
    ];
}
```
## In PublicController
- ### Add postNewComment function
```bash
public function postNewComment(AddCommentRequest $request, Product $product){
    CommentAction::addComment($request, $product->id);
    return redirect(route('visitComment'));
}
```
## Update singleProduct.blade.php File
```bash
<div id="comment" class="tabcontent">
    @foreach ($product->comments as $comment)
    @if ($comment->status == 1)
    <div class="user">
        <p>{{ $comment->user->name }}</p>
    </div>
    <div class="userComment">
        <p>{{ $comment->description }}</p>
    </div>
    @endif
    @endforeach
    @auth
    <hr>
    <div style="width: 79%">
        @include('include.showError')
        @include('include.validationError')
    </div>
    <div class="newComment">
        <form action="{{ route('postNewComment', $product) }}" method="post">
            @csrf
            <textarea name="comment" placeholder="نظر خود را بنویسید ..."></textarea>
            <input type="submit" value="ثبت نظر">
        </form>
    </div>
    @endauth
</div>
```
