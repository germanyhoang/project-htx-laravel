<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function getContact(Request $request)
    {
        $contacts = Contact::all();
        return view('admin.contact.adminContact', compact('contacts'));
    }
    //xoa
    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('getContact')->with('success', 'News deleted successfully!');
    }
}
