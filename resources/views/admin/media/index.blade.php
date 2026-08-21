@extends('layouts.admin')
@section('title', 'Media & Features')
@section('heading', 'Media & Features')
@section('content')
<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
        <h2 style="margin:0;">Entries</h2>
        <a class="btn btn-gold" href="{{ route('admin.media.create') }}">+ New entry</a>
    </div>
    <table>
        <tr><th>Type</th><th>Title</th><th>Meta</th><th></th></tr>
        @foreach ($entries as $e)
        <tr><td><span class="pill">{{ $e->type }}</span></td><td><b>{{ $e->title }}</b><br><small>{{ \Illuminate\Support\Str::limit($e->description, 70) }}</small></td><td>{{ $e->meta1 }} @if($e->duration)· {{ $e->duration }}@endif</td>
        <td class="actions"><div class="row-acts"><a class="btn btn-line" href="{{ route('admin.media.edit', $e) }}">Edit</a>
        <form method="POST" action="{{ route('admin.media.destroy', $e) }}">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form></div></td></tr>
        @endforeach
    </table>
</div>
@endsection
