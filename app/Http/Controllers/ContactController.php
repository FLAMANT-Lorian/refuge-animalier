<?php

namespace App\Http\Controllers;

use App\Enums\MessageStatus;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.pages.contact');
    }

    public function store(StoreMessageRequest $request)
    {
        $message = $request->validated();

        Message::create([
            'full_name' => $message['full_name'],
            'email' => $message['email'],
            'message' => $message['message'],
            'object' => $message['object'],
            'submit_date' => now()->format('Y-m-d'),
            'status' => MessageStatus::Unread->value,
        ]);

        $request->session()->flash('status', 'Message envoyé avec succès !');

        return redirect()->back();

    }
}
