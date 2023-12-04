<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('contact.contact');
    }

    public function store(ContactRequest $request): \Illuminate\Http\RedirectResponse
    {
        $contact = new Contact();

        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $this->send($request);
        return redirect()->back()->with('status', 'Email creado exitosamente.');
    }

    public function send(ContactRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        Mail::to('encuentrointit@ufpso.edu.co')->send(new ContactFormMail($data));

        return redirect()->route('contact_show')->with('success', 'Tu mensaje ha sido enviado correctamente, gracias!');
    }
}
