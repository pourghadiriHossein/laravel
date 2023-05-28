# Update Public Layout Menu and Footer


## Add One Query to CategoryAction
```bash
public static function getAllCategoriesForMenu()
{
    $allCategories = Category::where('parent_id',null)->with(['subCategories'])->get();
    return $allCategories;
}
```

## Update publicLayout.blade.php File
- ### Update menu
```bash
@foreach (\App\Actions\CategoryAction::getAllCategoriesForMenu() as $category)
<li class="dropdown">
    <button class="dropbtn">{{ $category->label }}</button>
    <div class="dropdown-content">
        @foreach ($category->subCategories as $subCategory)
        <a class="linkMenu" href="{{ route('product') }}">{{ $subCategory->label }}</a>
        @endforeach
    </div>
</li>
@endforeach
```
- ### Update footer
```bash
@foreach (\App\Actions\TagAction::getAllTags() as $tag)
<button class="footerBTN">{{ $tag->label }}</button>
@endforeach
```


