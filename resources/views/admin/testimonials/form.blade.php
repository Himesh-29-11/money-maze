@extends('layouts.admin')
@section('title', 'Testimonial')
@section('heading', $testimonial ? 'Edit testimonial' : 'New testimonial')
@section('content')
<div class="card">
<form method="POST" action="{{ $testimonial ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
@csrf
@if ($testimonial) @method('PUT') @endif
<label>Quote<textarea name="quote" required>{{ old('quote', $testimonial?->quote) }}</textarea></label>
<div class="grid2">
    <label>Author<input type="text" name="author" value="{{ old('author', $testimonial?->author) }}" required></label>
    <label>Role<input type="text" name="role" value="{{ old('role', $testimonial?->role) }}"></label>
    <label>Rating<select name="rating">@for($i=5;$i>=1;$i--)<option value="{{ $i }}" {{ old('rating', $testimonial?->rating) == $i ? 'selected' : '' }}>{{ $i }} ★</option>@endfor</select></label>
    <label>Sort order<input type="number" name="sort" value="{{ old('sort', $testimonial?->sort ?? 0) }}"></label>
</div>
<div class="row-acts"><button class="btn btn-green">Save</button><a class="btn btn-line" href="{{ route('admin.testimonials.index') }}">Cancel</a></div>
</form>
</div>
@endsection
