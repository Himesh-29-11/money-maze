<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use App\Models\ContactMessage;
use App\Models\MediaEntry;
use App\Models\NavLink;
use App\Models\Testimonial;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'articles' => $this->count(fn () => Article::count()),
                'testimonials' => $this->count(fn () => Testimonial::count()),
                'media' => $this->count(fn () => MediaEntry::count()),
                'books' => $this->count(fn () => Book::count()),
                'links' => $this->count(fn () => NavLink::count()),
                'messages' => $this->count(fn () => ContactMessage::count()),
            ],
            'messages' => $this->count(fn () => ContactMessage::query()->latest()->limit(5)->get()) ?? collect(),
        ]);
    }

    private function count(\Closure $fn)
    {
        try {
            return $fn();
        } catch (\Throwable) {
            return null;
        }
    }
}
