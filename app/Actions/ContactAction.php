<?php

namespace App\Actions;

use App\Models\Contact;

class ContactAction {
    //Query Part
    public static function getAllContact(){
        $contact = Contact::all();
        return $contact;
    }
    //Tools Part
    public static function checkContactStatus(Contact $contact)
    {
        if ($contact->status == 0)
        {
            $contact->status = 1;
            $contact->save();
        }
        return back();
    }
    //Edit Part

    //necessary function

}
