<?php

namespace App\Actions;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactAction {
    //Query Part

    // Edit Part
    
    //Edit Part
    public static function addContact($request)
    {
        $newContact = new Contact();
        if (Auth::user())
            $newContact->user_id = Auth::user()->id;
        $newContact->name = $request->input('name');
        $newContact->phone = $request->input('phone');
        $newContact->email = $request->input('email');
        $newContact->description = $request->input('description');
        $newContact->save();
        return back();
    }

    public static function checkContactStatus(Contact $contact)
    {
        if ($contact->status == 0)
        {
            $contact->status = 1;
            $contact->save();
        }
        return back();
    }
}
