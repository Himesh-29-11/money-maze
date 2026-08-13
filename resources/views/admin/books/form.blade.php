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
    <label>Cover image path<input type="text" name="cover" value="{{ old('cover', $book?->cover) }}"></label>
    <label>Sort order<input type="number" name="sort" value="{{ old('sort', $book?->sort ?? 0) }}"></label>
    <label style="align-self:end;display:flex;gap:8px;align-items:center;"><input type="hidden" name="featured" value="0"><input type="checkbox" name="featured" value="1" style="width:auto;" {{ old('featured', $book?->featured) ? 'checked' : '' }}> Featured book</label>
</div>
<label>Description<textarea name="description">{{ old('description', $book?->description) }}</textarea></label>
<div class="row-acts"><button class="btn btn-green">Save</button><a class="btn btn-line" href="{{ route('admin.books.index') }}">Cancel</a></div>
</form>
</div>
@endsection
