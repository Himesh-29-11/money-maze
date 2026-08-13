@extends('layouts.admin')
@section('title', 'Page Content')
@section('heading', 'Page Content')
@section('content')
@forelse ($groups as $page => $sections)
    <div style="margin:26px 0 10px;font-size:12px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:#a77e39;">{{ ucfirst($page) }} page</div>
    @foreach ($sections as $section => $items)
    <div class="card">
        <h2>{{ $section }}</h2>
        <p class="sub">Module: {{ $page }} / {{ $section }}</p>
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
            <button class="btn btn-green" type="submit">Save {{ $section }}</button>
        </form>
    </div>
    @endforeach
@empty
<div class="card"><p class="sub">Run <code>php artisan migrate --seed</code> to load editable content.</p></div>
@endforelse
@endsection
