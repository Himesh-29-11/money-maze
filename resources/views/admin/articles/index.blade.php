@extends('layouts.admin')
@section('title', 'Articles')
@section('heading', 'Articles')
@section('content')
<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
        <h2 style="margin:0;">All articles</h2>
        <a class="btn btn-gold" href="{{ route('admin.articles.create') }}">+ New article</a>
    </div>
    <table>
        <tr><th>Title</th><th>Topic</th><th>Publication</th><th>Date</th><th></th></tr>
        @foreach ($articles as $a)
        <tr>
            <td><b>{{ $a->title }}</b>@if($a->featured) <span class="pill">Featured</span>@endif</td>
            <td>{{ $a->topic }}</td><td>{{ $a->publication }}</td><td>{{ $a->published_at?->format('d M Y') }}</td>
            <td class="actions"><div class="row-acts">
                <a class="btn btn-line" href="{{ route('admin.articles.edit', $a) }}">Edit</a>
                <form method="POST" action="{{ route('admin.articles.destroy', $a) }}">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form>
            </div></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
