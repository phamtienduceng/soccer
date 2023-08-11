<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();

        return view('admin.pages.contactUs.index', compact('contacts'));
    }

    public function getContactUs(Request $request){
        $contact = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], 
        [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'subject.required' => 'Subject is required.',
            'message.required' => 'Message is required.',
        ]);
        
        Contact::create($contact);
        return redirect()->route('ui.contact')->with('message', 'Send message successfully');
    }

    public function viewContactDetail($id){
        $contact = Contact::where('id', $id)->first();

        return view('admin.pages.contactUs.viewContactDetail', compact('contact'));
    }
}
