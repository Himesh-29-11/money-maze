<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminContentController extends Controller
{
    public function index(Request $request): View
    {
        $query = SiteContent::query()->orderBy('page')->orderBy('section')->orderBy('sort');

        if ($request->filled('page')) {
            $query->where('page', $request->page);
        }

        $groups = $query->get()->groupBy('page')->map(fn ($items) => $items->groupBy('section'));

        $order = ['home', 'about', 'services', 'insights', 'media', 'books', 'testimonials', 'resources', 'contact', 'settings'];
        $groups = $groups->sortBy(fn ($items, $page) => in_array($page, $order, true) ? array_search($page, $order, true) : 99);

        return view('admin.content', ['groups' => $groups, 'only' => $request->query('page')]);
    }

    public function update(Request $request): RedirectResponse
    {
        $page = $request->input('page');
        $values = $request->input('values', []);

        foreach ($values as $key => $value) {
            SiteContent::query()->where('page', $page)->where('key', $key)->update(['value' => $value]);
        }

        return back()->with('status', ucfirst($page).' content saved.');
    }
}
