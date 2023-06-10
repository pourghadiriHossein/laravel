# Complete IDPay Gateway In Project

## Create GatewayAction file then Write necessary function
```bash
private static function send($orderID, $price)
{
    $params = array(
        'order_id' => $orderID,
        'amount' => $price,
        'name' => null,
        'phone' => null,
        'mail' => null,
        'desc' => null,
        'callback' => 'http://127.0.0.1:8000/callback',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
        'X-SANDBOX: 1'
    ));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
```
```bash
private static function verify($IDPayID, $orderID)
{
    $params = array(
        'id' => $IDPayID,
        'order_id' => $orderID,
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
        'X-SANDBOX: 1',
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}
```
```bash
public static function start($orderID, $price)
{
    $result = self::send($orderID, $price);
    $result = json_decode($result);
    return $result;
}
```
```bash
public static function done($IDPayID, $orderID)
{
    $result = self::verify($IDPayID, $orderID);
    $result = json_decode($result);
    return $result;
}
```
```bash
public static function gatewayStatusCode($code)
{
    switch ($code)
    {
        case -1:
            $message = '<p class="label label-warning" style="width: 250px"> خطای غیر منتظره </p>';
            break;
        case 1:
            $message = '<p class="label label-warning" style="width: 250px">پرداخت انجام نشده است</p>';
            break;
        case 2:
            $message = '<p class="label label-warning" style="width: 250px">پرداخت ناموفق بوده است</p>';
            break;
        case 3:
            $message = '<p class="label label-warning" style="width: 250px">خطا رخ داده است</p>';
            break;
        case 4:
            $message = '<p class="label label-warning" style="width: 250px">بلوکه شده</p>';
            break;
        case 5:
            $message = '<p class="label label-warning" style="width: 250px"> برگشت به پرداخت کننده </p>';
            break;
        case 6:
            $message = '<p class="label label-warning" style="width: 250px">برگشت خورده سیستمی</p>';
            break;
        case 7:
            $message = '<p class="label label-warning" style="width: 250px"> انصراف از پرداخت </p>';
            break;
        case 8:
            $message = '<p class="label label-warning" style="width: 250px">به درگاه پرداخت منتقل شد</p>';
            break;
        case 10:
            $message = '<p class="label label-warning" style="width: 250px">در انتظار تایید پرداخت</p>';
            break;
        case 11:
            $message = '<p class="label label-warning" style="width: 250px"> کاربر مسدود شده است </p>';
            break;
        case 12:
            $message = '<p class="label label-warning" style="width: 250px"> API Key یافت نشد </p>';
            break;
        case 13:
            $message = '<p class="label label-warning" style="width: 250px"> درخواست شما از {ip} ارسال شده است. این IP با IP های ثبت شده در وب سرویس همخوانی ندارد. </p>';
            break;
        case 14:
            $message = '<p class="label label-warning" style="width: 250px"> وب سرویس شما در حال بررسی است و یا تایید نشده است. </p>';
            break;
        case 15:
            $message = '<p class="label label-warning" style="width: 250px"> سرویس مورد نظر در دسترس نمی باشد </p>';
            break;
        case 21:
            $message = '<p class="label label-warning" style="width: 250px"> حساب بانکی متصل به وب سرویس تایید نشده است </p>';
            break;
        case 22:
            $message = '<p class="label label-warning" style="width: 250px"> وب سریس یافت نشد </p>';
            break;
        case 23:
            $message = '<p class="label label-warning" style="width: 250px"> اعتبار سنجی وب سرویس ناموفق بود </p>';
            break;
        case 24:
            $message = '<p class="label label-warning" style="width: 250px"> حساب بانکی مرتبط با این وب سرویس غیر فعال شده است </p>';
            break;
        case 31:
            $message = '<p class="label label-warning" style="width: 250px"> کد تراکنش id نباید خالی باشد </p>';
            break;
        case 32:
            $message = '<p class="label label-warning" style="width: 250px">شماره سفارش order_id نباید خالی باشد</p>';
            break;
        case 33:
            $message = '<p class="label label-warning" style="width: 250px">مبلغ amount نباید خالی باشد</p>';
            break;
        case 34:
            $message = '<p class="label label-warning" style="width: 250px"> مبلغ amount باید بیشتر از {min-amount} ریال باشد </p>';
            break;
        case 35:
            $message = '<p class="label label-warning" style="width: 250px"> مبلغ amount باید کمتر از {max-amount} ریال باشد </p>';
            break;
        case 36:
            $message = '<p class="label label-warning" style="width: 250px"> مبلغ amount بیشتر از حد مجاز است </p>';
            break;
        case 37:
            $message = '<p class="label label-warning" style="width: 250px"> آدرس بازگشت callback نباید خالی باشد </p>';
            break;
        case 38:
            $message = '<p class="label label-warning" style="width: 250px"> درخواست شما از آدرس {domain} ارسال شده است. دامنه آدرس بازگشت callback با آدرس ثبت شده در وب سرویس همخوانی ندارد </p>';
            break;
        case 39:
            $message = '<p class="label label-warning" style="width: 250px"> آدرس بازگشت callback نامعتبر است </p>';
            break;
        case 41:
            $message = '<p class="label label-warning" style="width: 250px"> فیلتر وضعیت تراکنش ها می بایست آرایه ای (لیستی) از وضعیت های مجاز در مستندات باشد </p>';
            break;
        case 42:
            $message = '<p class="label label-warning" style="width: 250px"> فیلتر تاریخ پرداخت می بایست آرایه ای شامل المنت های min و max از نوع timestamp باشد </p>';
            break;
        case 43:
            $message = '<p class="label label-warning" style="width: 250px"> فیلتر تاریخ تسویه می بایست آرایه ای شامل المنت های min و max از نوع timestamp باشد </p>';
            break;
        case 44:
            $message = '<p class="label label-warning" style="width: 250px"> فیلتر تراکنش صحیح نمی باشد </p>';
            break;
        case 51:
            $message = '<p class="label label-warning" style="width: 250px"> تراکنش ایجاد نشد </p>';
            break;
        case 52:
            $message = '<p class="label label-warning" style="width: 250px"> استعلام نتیجه ای نداشت </p>';
            break;
        case 53:
            $message = '<p class="label label-warning" style="width: 250px"> تایید پرداخت امکان پذیر نیست </p>';
            break;
        case 54:
            $message = '<p class="label label-warning" style="width: 250px"> مدت زمان تایید پرداخت سپری شده است </p>';
            break;
        case 100:
            $message = '<p class="label label-success" style="width: 250px">پرداخت تایید شده است</p>';
            break;
        case 101:
            $message = '<p class="label label-success" style="width: 250px">پرداخت قبلا تایید شده است</p>';
            break;
        case 200:
            $message = '<p class="label label-warning" style="width: 250px">به دریافت کننده واریز شد</p>';
            break;
    }
    return $message;
}
```

## Create OrderAction file then Write necessary function
```bash
public static function getOrder($order_id){
    $order = Order::find($order_id);
    return $order;
}
```
```bash
public static function getAllOrders(){
    $orders = Order::all();
    return $orders;
}
```
```bash
public static function addOrder($currentAddressID)
{
    $totalDiscount = SessionAction::calculateDiscountSession();
    $discounts = SessionAction::getTokenDiscount();
    $total_price = SessionAction::calculateCart();

    $newOrder = new Order();
    $newOrder->user_id = Auth::id();
    $newOrder->address_id = $currentAddressID;
    if (!$totalDiscount == 0) {
        foreach ($discounts as $discount)
            $newOrder->discount_id = $discount->id;
    }
    $newOrder->total_price = $total_price;
    $newOrder->pay_price = $total_price - $totalDiscount;
    $newOrder->status = 0;
    $newOrder->save();

    return [$newOrder->id, $newOrder->pay_price];
}
```
```bash
public static function addNewList($newOrder_id)
{
    $baskets = SessionAction::getBasket();
    foreach($baskets as $basket){
        $newOrderListItem = new OrderListItem();

        $newOrderListItem->product_id = $basket[0]->id;
        $newOrderListItem->order_id = $newOrder_id;
        $newOrderListItem->price = $basket[0]->price;
        if($basket[0]->discount_id)
            $newOrderListItem->pay_price = SessionAction::calculateDiscount($basket[0]->price, $basket[0]->discount->price, $basket[0]->discount->percent) * $basket[1] ;
        else
            $newOrderListItem->pay_price = $basket[0]->price;
        $newOrderListItem->count = $basket[1];
        $newOrderListItem->status = 1;
        $newOrderListItem->save();
    }
}
```
## Create TransactionAction file then Write necessary function
```bash
public static function getAllTransaction(){
    $transactions = Transaction::all();
    return $transactions;
}
```
```bash
public static function newTransaction($newOrder_id, $newOrder_pay_price)
{
    $status = [
        'error' => 0,
        'link' => null,
    ];

    $newTransaction = new Transaction();
    $newTransaction->order_id = $newOrder_id;
    $newTransaction->amount = $newOrder_pay_price;

    $result = GatewayAction::start($newOrder_id, $newOrder_pay_price);
    if (isset($result->error_code))
    {
        $newTransaction->status = $result->error_code;
        $newTransaction->save();
        SessionAction::clean();
        SessionAction::cleanTokenDiscount();
        $status['error'] = 1;
        return $status;
    }
    else{
        $newTransaction->IDPay_id = $result->id;
        $newTransaction->save();
        SessionAction::clean();
        SessionAction::cleanTokenDiscount();
        $status['link'] = $result->link;
        return $status;
    }
}
```
```bash
public static function responseToCallback($request)
{
    $IDPayID = $request->input('id');
    $orderID = $request->input('order_id');
    $transaction = Transaction::where([['order_id', $orderID],['IDPay_id',$IDPayID]])->first();
    $result = GatewayAction::done($IDPayID, $orderID);
    if (isset($result->error_code))
    {
        $transaction->status = $result->error_code;
        $transaction->save();
        return back();
    }
    else {
        $transaction->status = $result->status;
        $transaction->IDPay_track_id = $result->track_id;
        $transaction->card_no = $result->payment->card_no;
        $transaction->pay_date = $result->date;
        $transaction->verify_date = $result->verify->date;
        $transaction->save();
        $order = OrderAction::getOrder($orderID);
        $order->status = 1;
        $order->save();
        return back();
    }
}
```


## Add two Function to AddressAction
```bash
public static function getUserAddresses($user_id){
    $addresses = Address::where('user_id',$user_id)->where('status',1)->get();
    return $addresses;
}
```
```bash
public static function addAddress($request)
{
    $newAddress = new Address();
    $newAddress->user_id = Auth::id();
    $newAddress->city_id = $request->input('city_id');
    $newAddress->detail = $request->input('detail');
    $newAddress->save();
    return $newAddress->id;
}
```

## Add Three Route to web.php File
- ### For post Checkout
```bash
Route::post('checkout',[PublicController::class, 'postCheckout'])->name('postCheckout');
```
- ### For IDPay
```bash
Route::get('gateway/{order_id}',[PublicController::class,'sendForPay'])->name('sendForPay');
Route::post('callback',[PublicController::class,'callback'])->name('callback');
```
## Create CheckoutRequest
- ### Command
```bash
php artisan make:request CheckoutRequest
```
- ### Update CheckoutRequest File
```bash
public function authorize()
{
    return true;
}
``` 
```bash
public function rules()
{
    if($this->input('previousAddress')){
        return [
            'previousAddress' => 'accepted',
            'acceptTerm' => 'accepted',
        ];
    }else{
        return [
            'newAddress' => 'accepted',
            'acceptTerm' => 'accepted',
        ];
    }

}
```
```bash
public function messages()
{
    return [
        'previousAddress.accepted' => 'یکی از حالت های آدرس باید انتخاب شود',
        'newAddress.accepted' => 'یکی از حالت های آدرس باید انتخاب شود',
        'acceptTerm.accepted' => 'قوانین و مقررات سایت پذرفته نشده است',
    ];
}
```

## Add callback exception to App\Http\Middleware\VerifyCsrfToken.php File

## Update Transaction Model
```bash
protected $casts = [
    'pay_date' => 'datetime',
    'verify_date' => 'datetime',
];
```
## In PublicController
- ### Update checkout function
```bash
public function checkout() {
    if (Auth::guest())
        return redirect(route('login'));
    $addresses = AddressAction::getUserAddresses(Auth::id());
    $cities = RCAction::getAllCity();
    return view('public.checkout', compact('addresses', 'cities'));
}
```
- ### Add postCheckout function
```bash
public function postCheckout(CheckoutRequest $request){
    if (!empty(SessionAction::getBasket())) {
        if ($request->input('newAddress')){
            $currentAddressID = AddressAction::addAddress($request);
        }else{
            $currentAddressID = $request->input('selectedPreviousAddress');
        }

        list($newOrder_id, $newOrder_pay_price) = OrderAction::addOrder($currentAddressID);

        OrderAction::addNewList($newOrder_id);

        $status = TransactionAction::newTransaction($newOrder_id, $newOrder_pay_price);
        if($status['error'] == 1)
            return redirect(route('adminVisitOrder'));
        else
            return redirect($status['link']);
    }else
        return redirect(route('home'));
}
```
- ### Add callback function
```bash
public function callback(Request $request)
{
    if (!$request->input('order_id'))
        return redirect(route('visitOrder'));
    TransactionAction::responseToCallback($request);
    return redirect(route('visitTransaction'));
}
```
- ### Add sendForPay function
```bash
public function sendForPay($order_id)
{
    $order = OrderAction::getOrder($order_id);
    $order_id = $order->id;
    $order_pay_price = $order->pay_price;
    $status = TransactionAction::newTransaction($order_id, $order_pay_price);
        if($status['error'] == 1)
            return redirect(route('adminVisitOrder'));
        else
            return redirect($status['link']);
}
```

## In PrivateController
- ### Update visitOrder function
```bash
public function visitOrder() {
    $orders = OrderAction::getAllOrders();
    return view('private.order.visitOrder', compact('orders'));
}
```
- ### Update visitTransaction function
```bash
public function visitTransaction() {
    $transactions = TransactionAction::getAllTransaction();
    return view('private.transaction.visitTransaction', compact('transactions'));
}
```

## Update checkout.blade.php File
- ### Update main box
```bash
<div class="mainBox checkout">
    @include('include.showError')
    @include('include.validationError')
    <form action="{{ route('postCheckout') }}" method="post" autocomplete="on">
        @csrf
        <div class="partition">
            <div class="previousAddress">
                <label><input type="checkbox" name="previousAddress">&nbsp; آردس پیش فرض &nbsp;</label>
                @foreach ($addresses as $address)
                <label><input type="radio" value="{{ $address->id }}" name="selectedPreviousAddress"> {{ $address->city->region->label }} - {{ $address->city->label }} - {{ $address->detail }} </label>
                @endforeach
            </div>
            <div class="newAddress">
                <label><input type="checkbox" name="newAddress">&nbsp; آردس پیش فرض &nbsp;</label>
                <input list="region" name="city_id" placeholder="کد شهر خود را انتخاب کنید">
                <datalist id="region">
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->region->label }} - {{ $city->label }}</option>
                    @endforeach
                </datalist>
                <input type="text" name="detail" placeholder="جزئیات آدرس: مثال گلسار - چهار راه اصفهان" maxlength="100">
            </div>
        </div>
        <div class="partition">
            <div class="factor">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">جمع بندی سبد خرید</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>جمع کل سبد خرید</td>
                            <td>
                                @if (\App\Actions\SessionAction::calculateCart())
                                {{ \App\Actions\SessionAction::calculateCart() }} ریال
                                @else
                                سبد خالی است
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>هزینه ارسال</td>
                            <td>رایگان</td>
                        </tr>
                        <tr>
                            <td>کد تخفیف</td>
                            <td>
                                @if (!empty(\App\Actions\SessionAction::getTokenDiscount()))
                                    @foreach (\App\Actions\SessionAction::getTokenDiscount() as $dis)
                                        @if ($dis->price)
                                            کسر {{ (int) $dis->price }} ريال
                                        @else
                                            کسر {{ (int) $dis->percent }} درصد
                                        @endif
                                    @endforeach
                                @else
                                سبد خالی است
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>جمع کل </th>
                            <th>
                                @if (\App\Actions\SessionAction::calculateCart())
                                {{ \App\Actions\SessionAction::calculateCart() - \App\Actions\SessionAction::calculateDiscountSession() }} ریال
                                @else
                                سبد خالی است
                                @endif
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="personalData">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">مشخصات فردی</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">{{ Auth::user()->name }}</td>
                            <td>{{ Auth::user()->phone }}</td>
                        </tr>
                        <tr>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="partition">
            <label>
                <input type="checkbox" name="acceptTerm">
                &nbsp; <a href="{{ route('tac') }}">قوانین و مقررات</a> سایت را مطالعه کرده و با آگاهی کامل شرایط خرید آنلاین را می پذیرم. &nbsp;
            </label>
            <input type="submit" value="تایید و پرداخت">
        </div>
    </form>
</div>
```
## Update visitOrder.blade.php File
- ### Update tbody tag
```bash
<tbody>
    @foreach ($orders as $order)
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->user->name}}</td>
        <td>{{$order->address->city->region->label}}</td>
        <td>{{$order->address->city->label}}</td>
        <td>{{$order->address->detail}}</td>
        <td>
            @if ($order->discount_id)
            {{$order->discount->label}}
            @else
            تخفیف ندارد
            @endif
        </td>
        <td>{{$order->total_price}} ریال</td>
        <td>{{$order->pay_price}} ریال</td>
        <td>
            @if ($order->status == 0)
            <p class="label label-danger" style="width: 250px">پرداخت نشده</p>
            @else
            <p class="label label-success" style="width: 250px">پرداخت شده</p>
            @endif
        </td>
        <td>
            @if ($order->status == 0)
            <a style="display: inline-block" class="label label-warning" href="{{route('sendForPay', $order->id)}}">پرداخت</a><br>
            <a style="display: inline-block" class="label label-info" data-toggle="modal" href="#myModal{{$order->id}}">محصولات</a><br>
            <div class="modal fade" id="myModal{{$order->id}}" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;
                            </button>
                            <h4 class="modal-title">محصولات ثبت شده در این سفارش</h4>
                        </div>
                        <div class="modal-body">
                            <table id="orderTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: right">شناسه</th>
                                        <th style="text-align: right">تصویر محصول</th>
                                        <th style="text-align: right">نام محصول</th>
                                        <th style="text-align: right">تعداد محصول</th>
                                        <th style="text-align: right">قیمت محصول</th>
                                        <th style="text-align: right">قیمت پرداختی</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderListItems as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <img src="{{ asset($item->product->productImages[0]->path) }}"
                                                height="50" width="40">
                                        </td>
                                        <td>{{$item->product->label}}</td>
                                        <td>{{$item->count}}</td>
                                        <td>{{$item->price}} ريال</td>
                                        <td>{{$item->pay_price}} ريال</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-warning"
                                type="button">بستن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <a class="label label-info" data-toggle="modal" href="#myModal{{$order->id}}">محصولات</a><br>
            <div class="modal fade" id="myModal{{$order->id}}" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;
                            </button>
                            <h4 class="modal-title">محصولات ثبت شده در این سفارش</h4>
                        </div>
                        <div class="modal-body">
                            <table id="orderTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: right">شناسه</th>
                                        <th style="text-align: right">تصویر محصول</th>
                                        <th style="text-align: right">نام محصول</th>
                                        <th style="text-align: right">تعداد محصول</th>
                                        <th style="text-align: right">قیمت محصول</th>
                                        <th style="text-align: right">قیمت پرداختی</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderListItems as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <img src="{{ asset($item->product->productImages[0]->path) }}"
                                                height="50" width="40">
                                        </td>
                                        <td>{{$item->product->label}}</td>
                                        <td>{{$item->count}}</td>
                                        <td>{{$item->price}} ريال</td>
                                        <td>{{$item->pay_price}} ريال</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-warning"
                                type="button">بستن
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </td>
    </tr>
    @endforeach
</tbody>
```
## Update visitTransaction.blade.php File
- ### Update tbody tag
```bash
<tbody>
    @foreach ($transactions as $transaction)
    <tr>
        <td>{{$transaction->id}}</td>
        <td>{{$transaction->order_id}}</td>
        <td>{{$transaction->amount}} ریال</td>
        <td>{{$transaction->IDPay_track_id}}</td>
        <td>{{$transaction->IDPay_id}}</td>
        <td>{{$transaction->card_no}}</td>
        <td>{{$transaction->pay_date}}</td>
        <td>{{$transaction->verify_date}}</td>
        <td>
            {!! \App\Actions\GatewayAction::gatewayStatusCode($transaction->status) !!}
        </td>
    </tr>
    @endforeach
</tbody>
```
