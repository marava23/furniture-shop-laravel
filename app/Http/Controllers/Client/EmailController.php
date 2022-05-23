<?php

namespace App\Http\Controllers\Client;
use App\Http\Requests\SendMessageRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends ClientController
{
    public function create(){
        return view('pages.client.contact', $this->data);
    }

    public function sendEmail(SendMessageRequest $request)
    {
        try {
            Mail::to("maravicmilos1@gmail.com")->send(new ContactMail($request->email,$request->name, $request->title, $request->message));

            $this->logAction("User sent a contact message.", $request);

            return redirect()->back()->with("messages", ["Your email was sent successfully."]);
        } catch(Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error."]);
        }
    }
}
