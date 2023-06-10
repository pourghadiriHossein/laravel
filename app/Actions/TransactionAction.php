<?php

namespace App\Actions;

use App\Models\Order;
use App\Models\Transaction;

class TransactionAction {

    public static function getAllTransaction(){
        $transactions = Transaction::all();
        return $transactions;
    }
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
}
