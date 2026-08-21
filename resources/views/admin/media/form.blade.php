@extends('layouts.admin')
@section('title', 'Media entry')
@section('heading', $entry ? 'Edit media entry' : 'New media entry')
@section('content')
<div class="card">
<form method="POST" action="{{ $entry ? route('admin.media.update', $entry) : route('admin.media.store') }}">
@csrf
@if ($entry) @method('PUT') @endif
<div class="grid2">
    <label>Type<select name="type"><option value="interview" {{ old('type', $entry?->type) === 'interview' ? 'selected' : '' }}>Television interview</option><option value="video" {{ old('type', $entry?->type) === 'video' ? 'selected' : '' }}>Video</option><option value="podcast" {{ old('type', $entry?->type) === 'podcast' ? 'selected' : '' }}>Podcast</option><option value="feature" {{ old('type', $entry?->type) === 'feature' ? 'selected' : '' }}>Featured-in tile</option></select></label>
    <label>Label (e.g. POCKET MONEY)<input type="text" name="label" value="{{ old('label', $entry?->label) }}"></label>
    <label>Title<input type="text" name="title" value="{{ old('title', $entry?->title) }}" required></label>
    <label>Meta line 1 (channel / publication)<input type="text" name="meta1" value="{{ old('meta1', $entry?->meta1) }}"></label>
    <label>Meta line 2 (topic / subtitle)<input type="text" name="meta2" value="{{ old('meta2', $entry?->meta2) }}"></label>
    <label>Duration (e.g. 02:00)<input type="text" name="duration" value="{{ old('duration', $entry?->duration) }}"></label>
    <label>Image
    <div class="up-zone" data-upload="{{ route('admin.upload') }}" data-target="media_image">
        <input type="file" accept="image/*" hidden>
        <div class="up-preview"></div>
        <span class="up-hint">Drag &amp; drop an image here, or click to browse (max 5 MB)</span>
    </div>
    <input type="hidden" id="media_image" name="image" value="{{ old('image', $entry?->image) }}">
    <span class="up-hint up-status">{{ old('image', $entry?->image) ? 'Custom image saved — upload a new one to replace it.' : 'No image yet — upload one above.' }}</span>
</label>
    <label>Link URL<input type="url" name="url" value="{{ old('url', $entry?->url) }}"></label>
</div>
<label>Description<textarea name="description">{{ old('description', $entry?->description) }}</textarea></label>
<label>Sort order<input type="number" name="sort" value="{{ old('sort', $entry?->sort ?? 0) }}"></label>
<div class="row-acts"><button class="btn btn-green">Save</button><a class="btn btn-line" href="{{ route('admin.media.index') }}">Cancel</a></div>
</form>
</div>
@endsection
