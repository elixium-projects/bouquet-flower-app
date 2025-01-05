<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only(['name', 'email', 'message']);

        Mail::to('gamshot27@gmail.com')->send(new ContactMessage($data));

        return back()->with('success', 'Pesan Anda berhasil dikirim.');
    }
}
