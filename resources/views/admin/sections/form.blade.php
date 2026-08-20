@extends('layouts.admin')
@section('title', $section ? 'Edit section' : 'Add section')
@section('heading', $section ? 'Edit section' : 'Add section')
@section('content')
<div class="card">
    <form method="POST" action="{{ $section ? route('admin.sections.update', $section) : route('admin.sections.store') }}">
        @csrf
        @if ($section) @method('PUT') @endif
        <div class="grid2">
            <label>Page
                <select name="page" required>
                    @foreach (['home','about','services','insights','media','books','testimonials','resources','contact'] as $p)
                        <option value="{{ $p }}" @selected(old('page', $section?->page) === $p)>{{ ucfirst($p) }}</option>
                    @endforeach
                </select>
            </label>
            <label>Key (slug, e.g. what_i_do)<input type="text" name="key" value="{{ old('key', $section?->key) }}" required></label>
        </div>
        <label>Section title<input type="text" name="title" value="{{ old('title', $section?->title) }}"></label>
        <label>Body (HTML allowed: &lt;p&gt;, &lt;ul&gt;/&lt;ol&gt;/&lt;li&gt;, &lt;strong&gt;, &lt;a&gt;)
            <textarea name="body" rows="12">{{ old('body', $section?->body) }}</textarea>
        </label>
        <div class="grid2">
            <label>Sort order<input type="number" name="sort" value="{{ old('sort', $section?->sort ?? 0) }}"></label>
            <label style="align-self:end;display:flex;gap:8px;align-items:center;">
                <input type="hidden" name="visible" value="0">
                <input type="checkbox" name="visible" value="1" style="width:auto;" {{ old('visible', $section?->visible ?? true) ? 'checked' : '' }}>
                Visible on site
            </label>
        </div>
        <div class="row-acts">
            <button class="btn btn-green">Save section</button>
            <a class="btn btn-line" href="{{ route('admin.sections.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
