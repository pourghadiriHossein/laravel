# Write the Relations Between Bodels In Laravel

<ul>
<br><li>For One To Many Relation
<pre>
    public function {Your Function Name In Singular Form}()
    {
        return $this->belongsTo({Your Destination Model Name}::class);
    }
</pre>
</li>
<br><li>For Many To One Relation
<pre>
    public function {Your Function Name In Plural Form}()
    {
        return $this->hasMany({Your Destination Model Name}::class);
    }
</pre>
</li>
<br><li>For Many To Many Relation
<pre>
    public function {Your Function Name In Plural Form}()
    {
        return $this->belongsToMany({Your Destination Model Name}::class);
    }
</pre></li>
</ul>

<ol>
    <li>Check users Migration For Find Relations Between User and Another Models</li><br>
    <li>Check contacts Migration For Find Relations Between Contact and Another Models</li><br>
    <li>Check discounts Migration For Find Relations Between Discount and Another Models</li><br>
    <li>Check categories Migration For Find Relations Between Category and Another Models</li><br>
    <li>Check tags Migration For Find Relations Between Tag and Another Models</li><br>
    <li>Check products Migration For Find Relations Between Product and Another Models</li><br>
    <li>Check product_images Migration For Find Relations Between ProductImage and Another Models</li><br>
    <li>Check comments Migration For Find Relations Between Comment and Another Models</li><br>
    <li>Check regions Migration For Find Relations Between Region and Another Models</li><br>
    <li>Check cities Migration For Find Relations Between City and Another Models</li><br>
    <li>Check addresses Migration For Find Relations Between Address and Another Models</li><br>
    <li>Check orders Migration For Find Relations Between Order and Another Models</li><br>
    <li>Check transactions Migration For Find Relations Between Transaction and Another Models</li><br>
    <li>Check order_list_items Migration For Find Relations Between OrderListItem and Another Models</li><br>
    <li>Check product_tag Migration For Find Relations Between Product and Tag Model</li><br>
</ol>
