<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminMediaController extends Controller
{
    public function index(): View
    {
        return view('admin.media.index', ['entries' => MediaEntry::query()->orderBy('type')->orderBy('sort')->get()]);
    }

    public function create(): View
    {
        return view('admin.media.form', ['entry' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        MediaEntry::query()->create($this->validated($request));

        return redirect()->route('admin.media.index')->with('status', 'Media entry added.');
    }

    public function edit(MediaEntry $media): View
    {
        return view('admin.media.form', ['entry' => $media]);
    }

    public function update(Request $request, MediaEntry $media): RedirectResponse
    {
        $media->update($this->validated($request));

        return redirect()->route('admin.media.index')->with('status', 'Media entry updated.');
    }

    public function destroy(MediaEntry $media): RedirectResponse
    {
        $media->delete();

        return redirect()->route('admin.media.index')->with('status', 'Media entry deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'type' => ['required', 'string', 'in:interview,video,podcast,feature'],
            'label' => ['nullable', 'string', 'max:120'],
            'title' => ['required', 'string', 'max:255'],
            'meta1' => ['nullable', 'string', 'max:255'],
            'meta2' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:20'],
            'url' => ['nullable', 'string', 'max:255'],
            'sort' => ['nullable', 'integer'],
        ]);
        if (($data['image'] ?? null) === '') {
            $data['image'] = null;
        }

        return $data;
    }
}
