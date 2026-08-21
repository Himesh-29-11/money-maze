<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminBookController extends Controller
{
    public function index(): View
    {
        return view('admin.books.index', ['books' => Book::query()->orderBy('sort')->get()]);
    }

    public function create(): View
    {
        return view('admin.books.form', ['book' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        Book::query()->create($this->validated($request));

        return redirect()->route('admin.books.index')->with('status', 'Book added.');
    }

    public function edit(Book $book): View
    {
        return view('admin.books.form', ['book' => $book]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $book->update($this->validated($request));

        return redirect()->route('admin.books.index')->with('status', 'Book updated.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('admin.books.index')->with('status', 'Book deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:60'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'cover' => ['nullable', 'string', 'max:255'],
            'featured' => ['nullable', 'boolean'],
            'sort' => ['nullable', 'integer'],
        ]);
        if (($data['cover'] ?? null) === '') {
            $data['cover'] = null;
        }

        return $data;
    }
}
