<?php

namespace App\Actions;

use App\Models\Order;
use App\Models\OrderListItem;
use Illuminate\Support\Facades\Auth;

class OrderAction {
    //Query Part
    public static function getOrder($order_id){
        $order = Order::find($order_id);
        return $order;
    }
    public static function getAllOrders(){
        $orders = Order::all();
        return $orders;
    }
    //Tools Part

    //Edit Part

    //necessary function

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
}
