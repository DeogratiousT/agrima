<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;

class ContactController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Contact::class);
        }

        $contacts = Contact::all()->count();
        return view('admin.contacts.index', ['contacts'=>$contacts]);
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'message' => 'required'
        ]));

        return redirect()->route('contact')->with('success','Message Sent Successfully');
    }
}
