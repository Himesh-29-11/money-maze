@extends('layouts.admin')
@section('title', 'Page Sections')
@section('heading', 'Page Sections')
@section('content')
<div class="jump-bar">
    @foreach ($groups as $page => $items)
        <a href="#sec-{{ $page }}">{{ ucfirst($page) }}</a>
    @endforeach
    <a class="btn btn-gold" style="margin-left:auto;padding:6px 14px;" href="{{ route('admin.sections.create') }}">+ Add section</a>
</div>
@forelse ($groups as $page => $items)
    <div id="sec-{{ $page }}" class="content-page-block">
        <div class="page-block-title">{{ ucfirst($page) }} page</div>
        <div class="card">
            <table>
                <tr><th>Section</th><th>Title</th><th>Visible</th><th style="width:150px">Actions</th></tr>
                @foreach ($items as $s)
                    <tr>
                        <td><b>{{ $s->key }}</b></td>
                        <td>{{ $s->title ?? '—' }}</td>
                        <td>{{ $s->visible ? '✅' : '🚫' }}</td>
                        <td>
                            <div class="row-acts">
                                <a class="btn btn-line" href="{{ route('admin.sections.edit', $s) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.sections.destroy', $s) }}" onsubmit="return confirm('Delete this section? The page will fall back to default text.')">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@empty
    <div class="card"><p class="sub">Run <code>php artisan migrate --seed</code> to load the draft sections.</p></div>
@endforelse
@endsection
