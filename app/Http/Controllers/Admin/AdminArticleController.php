<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminArticleController extends Controller
{
    public function index(): View
    {
        return view('admin.articles.index', ['articles' => Article::query()->orderByDesc('published_at')->get()]);
    }

    public function create(): View
    {
        return view('admin.articles.form', ['article' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        Article::query()->create($data + ['slug' => Str::slug($data['title'])]);

        return redirect()->route('admin.articles.index')->with('status', 'Article created.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', ['article' => $article]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $article->update($this->validated($request));

        return redirect()->route('admin.articles.index')->with('status', 'Article updated.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->with('status', 'Article deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['nullable', 'string', 'max:120'],
            'publication' => ['nullable', 'string', 'max:120'],
            'excerpt' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'english_url' => ['nullable', 'string', 'max:255'],
            'gujarati_url' => ['nullable', 'string', 'max:255'],
            'featured' => ['nullable', 'boolean'],
        ]);
        if (($data['image'] ?? null) === '') {
            $data['image'] = null;
        }

        return $data;
    }
}
