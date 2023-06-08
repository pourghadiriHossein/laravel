<?php

namespace App\Http\Controllers;

use App\Actions\SessionAction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function session(Request $request,$ID,$quantity,$sessionTask)
    {
        switch ($sessionTask)
        {
            case 'add':
                if ($request->input('quantity'))
                    SessionAction::addProduct($ID,$request->input('quantity'));
                else
                    SessionAction::addProduct($ID,$quantity);
                break;
            case 'remove':
                SessionAction::remove($ID);
                break;
            case 'clean':
                SessionAction::clean();
                break;
            case 'addTokenDiscount':
                if ($request->input('giftCode')) {
                    SessionAction::addTokenDiscount($request->input('giftCode'));
                }
                break;
        }
        return redirect(url()->previous());
    }
}
