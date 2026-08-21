@extends('layouts.admin')
@section('title', 'Book')
@section('heading', $book ? 'Edit book' : 'New book')
@section('content')
<div class="card">
<form method="POST" action="{{ $book ? route('admin.books.update', $book) : route('admin.books.store') }}">
@csrf
@if ($book) @method('PUT') @endif
<div class="grid2">
    <label>Key (slug)<input type="text" name="key" value="{{ old('key', $book?->key) }}" required></label>
    <label>Title<input type="text" name="title" value="{{ old('title', $book?->title) }}" required></label>
    <label>Subtitle<input type="text" name="subtitle" value="{{ old('subtitle', $book?->subtitle) }}"></label>
    <label>Image
    <div class="up-zone" data-upload="{{ route('admin.upload') }}" data-target="book_cover">
        <input type="file" accept="image/*" hidden>
        <div class="up-preview"></div>
        <span class="up-hint">Drag &amp; drop an image here, or click to browse (max 5 MB)</span>
    </div>
    <div class="up-actions"><button type="button" class="btn btn-line up-remove">Remove image</button></div>
    <input type="hidden" id="book_cover" name="cover" value="{{ old('cover', $book?->cover) }}">
    <span class="up-hint up-status">{{ old('cover', $book?->cover) ? 'Custom image saved — upload a new one to replace it.' : 'No image yet — upload one above.' }}</span>
</label>
    <label>Sort order<input type="number" name="sort" value="{{ old('sort', $book?->sort ?? 0) }}"></label>
    <label style="align-self:end;display:flex;gap:8px;align-items:center;"><input type="hidden" name="featured" value="0"><input type="checkbox" name="featured" value="1" style="width:auto;" {{ old('featured', $book?->featured) ? 'checked' : '' }}> Featured book</label>
</div>
<label>Description<textarea name="description">{{ old('description', $book?->description) }}</textarea></label>
<div class="row-acts"><button class="btn btn-green">Save</button><a class="btn btn-line" href="{{ route('admin.books.index') }}">Cancel</a></div>
</form>
</div>
@endsection
