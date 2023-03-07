# Write the Relations Between Bodels In Laravel

## For One To Many Relation
```bash
public function {Your Function Name In Singular Form}()
{
    return $this->belongsTo({Your Destination Model Name}::class);
}
```

## For Many To One Relation
```bash
public function {Your Function Name In Plural Form}()
{
    return $this->hasMany({Your Destination Model Name}::class);
}
```

## For Many To Many Relation
```bash
public function {Your Function Name In Plural Form}()
{
    return $this->belongsToMany({Your Destination Model Name}::class);
}
```

## Check users Migration For Find Relations Between User and Another Models
```bash
use HasApiTokens, HasFactory, Notifiable, HasRoles;

protected $fillable = [
    'name',
    'email',
    'phone',
    'password',
];

protected $guarded = [
    'status'
];

protected $visible = [
    'name',
    'email',
    'phone',
    'status',
];

protected $hidden = [
    'password',
    'remember_token',
];

public function contacts()
{
    return $this->hasMany(Contact::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function addresses()
{
    return $this->hasMany(Address::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}

public function orderListItems()
{
    return $this->hasMany(OrderListItem::class);
}
```

## Check contacts Migration For Find Relations Between Contact and Another Models
```bash
public function user()
{
    return $this->belongsTo(User::class);
}
```

## Check discounts Migration For Find Relations Between Discount and Another Models
```bash
public function categories()
{
    return $this->hasMany(Category::class);
}

public function products()
{
    return $this->hasMany(Product::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}
```

## Check categories Migration For Find Relations Between Category and Another Models
```bash
public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

public function discount()
{
    return $this->belongsTo(Discount::class);
}

public function products()
{
    return $this->hasMany(Product::class);
}

public function subCategories()
{
    return $this->hasMany(Category::class,'parent_id','id');
}
```

## Check tags Migration For Find Relations Between Tag and Another Models
```bash
protected $guarded = [];
    
public function products()
{
    return $this->belongsToMany(Product::class);
}
```

## Check products Migration For Find Relations Between Product and Another Models
```bash
public function tags()
{
    return $this->belongsToMany(Tag::class);
}

public function discount()
{
    return $this->belongsTo(Discount::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

public function productImages()
{
    return $this->hasMany(ProductImage::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function orderListItems()
{
    return $this->hasMany(OrderListItem::class);
}
```

## Check product_images Migration For Find Relations Between ProductImage and Another Models
```bash
public function product()
{
    return $this->belongsTo(product::class);
}
```

## Check comments Migration For Find Relations Between Comment and Another Models
```bash
public function user()
{
    return $this->belongsTo(User::class);
}

public function product()
{
    return $this->belongsTo(Product::class);
}
```

## Check regions Migration For Find Relations Between Region and Another Models
```bash
public function cities()
{
    return $this->hasMany(City::class);
}
```

## Check cities Migration For Find Relations Between City and Another Models
```bash
public function region()
{
    return $this->belongsTo(Region::class);
}

public function addresses()
{
    return $this->hasMany(Address::class);
}
```

## Check addresses Migration For Find Relations Between Address and Another Models
```bash
public function city()
{
    return $this->belongsTo(City::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}
```

## Check orders Migration For Find Relations Between Order and Another Models
```bash
public function user()
{
    return $this->belongsTo(User::class);
}

public function address()
{
    return $this->belongsTo(Address::class);
}

public function discount()
{
    return $this->belongsTo(Discount::class);
}

public function transactions()
{
    return $this->hasMany(Transaction::class);
}

public function orderListItems()
{
    return $this->hasMany(OrderListItem::class);
}
```

## Check transactions Migration For Find Relations Between Transaction and Another Models
```bash
public function order()
{
    return $this->belongsTo(Order::class);
}
```

## Check order_list_items Migration For Find Relations Between OrderListItem and Another Models
```bash
public function product()
{
    return $this->belongsTo(Product::class);
}

public function order()
{
    return $this->belongsTo(Order::class);
}
```

