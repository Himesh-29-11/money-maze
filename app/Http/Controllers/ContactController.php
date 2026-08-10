<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'city' => ['nullable', 'string', 'max:80'],
            'category' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:4000'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thank you for reaching out. Your message has been received.');
    }
}
