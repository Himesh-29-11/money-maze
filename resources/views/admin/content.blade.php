@extends('layouts.admin')
@section('title', 'Page Content')
@section('heading', 'Page Content')
@section('content')
@forelse ($groups as $page => $items)
<div class="card">
    <h2>{{ ucfirst($page) }} page</h2>
    <p class="sub">Edit the copy used on the public {{ $page }} page, then save.</p>
    <form method="POST" action="{{ route('admin.content.update') }}">
        @csrf
        <input type="hidden" name="page" value="{{ $page }}">
        @foreach ($items as $item)
            <label>{{ $item->label }} <small>{{ $page }}.{{ $item->key }}</small>
                @if ($item->type === 'textarea')
                    <textarea name="values[{{ $item->key }}]">{{ $item->value }}</textarea>
                @else
                    <input type="text" name="values[{{ $item->key }}]" value="{{ $item->value }}">
                @endif
            </label>
        @endforeach
        <button class="btn btn-green" type="submit">Save {{ $page }} content</button>
    </form>
</div>
@empty
<div class="card"><p class="sub">Run <code>php artisan migrate --seed</code> to load editable content.</p></div>
@endforelse
@endsection
