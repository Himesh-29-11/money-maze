<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\View\View;

class AdminMessageController extends Controller
{
    public function index(): View
    {
        return view('admin.messages', ['messages' => ContactMessage::query()->latest()->get()]);
    }
}
