<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminContentController extends Controller
{
    public function index(): View
    {
        $groups = SiteContent::query()->orderBy('page')->orderBy('sort')->get()->groupBy('page');

        return view('admin.content', ['groups' => $groups]);
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
