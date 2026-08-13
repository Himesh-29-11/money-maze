@extends('layouts.admin')
@section('title', $article ? 'Edit article' : 'New article')
@section('heading', $article ? 'Edit article' : 'New article')
@section('content')
<div class="card">
<form method="POST" action="{{ $article ? route('admin.articles.update', $article) : route('admin.articles.store') }}">
@csrf
@if ($article) @method('PUT') @endif
<div class="grid2">
    <label>Title<input type="text" name="title" value="{{ old('title', $article?->title) }}" required></label>
    <label>Topic<input type="text" name="topic" value="{{ old('topic', $article?->topic) }}"></label>
    <label>Publication<input type="text" name="publication" value="{{ old('publication', $article?->publication) }}"></label>
    <label>Published on<input type="date" name="published_at" value="{{ old('published_at', $article?->published_at?->format('Y-m-d')) }}"></label>
    <label>English URL<input type="url" name="english_url" value="{{ old('english_url', $article?->english_url) }}"></label>
    <label>Gujarati URL<input type="url" name="gujarati_url" value="{{ old('gujarati_url', $article?->gujarati_url) }}"></label>
</div>
<label>Excerpt<textarea name="excerpt">{{ old('excerpt', $article?->excerpt) }}</textarea></label>
<label style="display:flex;gap:8px;align-items:center;"><input type="hidden" name="featured" value="0"><input type="checkbox" name="featured" value="1" style="width:auto;" {{ old('featured', $article?->featured) ? 'checked' : '' }}> Feature this article on the Insights page</label>
<div class="row-acts"><button class="btn btn-green">Save article</button><a class="btn btn-line" href="{{ route('admin.articles.index') }}">Cancel</a></div>
</form>
</div>
@endsection
