<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLinkController extends Controller
{
    public function index(): View
    {
        return view('admin.links.index', ['links' => NavLink::query()->orderBy('sort')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        NavLink::query()->create($this->validated($request));

        return redirect()->route('admin.links.index')->with('status', 'Link added.');
    }

    public function update(Request $request, NavLink $link): RedirectResponse
    {
        $link->update($this->validated($request));

        return redirect()->route('admin.links.index')->with('status', 'Link updated.');
    }

    public function destroy(NavLink $link): RedirectResponse
    {
        $link->delete();

        return redirect()->route('admin.links.index')->with('status', 'Link deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'label' => ['required', 'string', 'max:60'],
            'url' => ['required', 'string', 'max:255'],
            'sort' => ['nullable', 'integer'],
            'active' => ['nullable', 'boolean'],
        ]);
    }
}
