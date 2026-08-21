@extends('layouts.admin')
@section('title', 'Books')
@section('heading', 'Books')
@section('content')
<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
        <h2 style="margin:0;">Books</h2>
        <a class="btn btn-gold" href="{{ route('admin.books.create') }}">+ New book</a>
    </div>
    <table>
        <tr><th>Book</th><th>Subtitle</th><th></th></tr>
        @foreach ($books as $b)
        <tr><td><b>{{ $b->title }}</b> @if($b->featured)<span class="pill">Featured</span>@endif</td><td>{{ $b->subtitle }}</td>
        <td class="actions"><div class="row-acts"><a class="btn btn-line" href="{{ route('admin.books.edit', $b) }}">Edit</a>
        <form method="POST" action="{{ route('admin.books.destroy', $b) }}">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form></div></td></tr>
        @endforeach
    </table>
</div>
@endsection
