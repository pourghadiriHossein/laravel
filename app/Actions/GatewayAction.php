<?php

namespace App\Actions;

class GatewayAction {
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
    public static function start($orderID, $price)
    {
        $result = self::send($orderID, $price);
        $result = json_decode($result);
        return $result;
    }

    public static function done($IDPayID, $orderID)
    {
        $result = self::verify($IDPayID, $orderID);
        $result = json_decode($result);
        return $result;
    }

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
}
