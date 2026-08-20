<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminSectionController extends Controller
{
    public const ORDER = ['home', 'about', 'services', 'insights', 'media', 'books', 'testimonials', 'resources', 'contact'];

    public function index(): View
    {
        $groups = PageSection::query()->orderBy('page')->orderBy('sort')->get()
            ->groupBy('page')
            ->sortBy(fn ($items, $page) => in_array($page, self::ORDER, true) ? array_search($page, self::ORDER, true) : 99);

        return view('admin.sections.index', ['groups' => $groups]);
    }

    public function create(): View
    {
        return view('admin.sections.form', ['section' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        PageSection::query()->create($data + ['visible' => $request->boolean('visible', true)]);

        return redirect()->route('admin.sections.index')->with('status', 'Section created.');
    }

    public function edit(PageSection $section): View
    {
        return view('admin.sections.form', ['section' => $section]);
    }

    public function update(Request $request, PageSection $section): RedirectResponse
    {
        $section->update($this->validated($request) + ['visible' => $request->boolean('visible')]);

        return redirect()->route('admin.sections.index')->with('status', 'Section updated.');
    }

    public function destroy(PageSection $section): RedirectResponse
    {
        $section->delete();

        return redirect()->route('admin.sections.index')->with('status', 'Section deleted — the page falls back to its default layout text.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'page' => ['required', 'string', 'max:40'],
            'key' => ['required', 'string', 'max:60'],
            'title' => ['nullable', 'string', 'max:160'],
            'body' => ['nullable', 'string'],
            'sort' => ['nullable', 'integer'],
        ]);
    }
}
