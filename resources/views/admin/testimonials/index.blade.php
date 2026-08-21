@extends('layouts.admin')
@section('title', 'Testimonials')
@section('heading', 'Testimonials')
@section('content')
<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
        <h2 style="margin:0;">Client testimonials</h2>
        <a class="btn btn-gold" href="{{ route('admin.testimonials.create') }}">+ New testimonial</a>
    </div>
    <table>
        <tr><th>Quote</th><th>Author</th><th>Rating</th><th></th></tr>
        @foreach ($testimonials as $t)
        <tr><td>{{ \Illuminate\Support\Str::limit($t->quote, 90) }}</td><td>{{ $t->author }}<br><small>{{ $t->role }}</small></td><td>{{ str_repeat('★', $t->rating) }}</td>
        <td class="actions"><div class="row-acts"><a class="btn btn-line" href="{{ route('admin.testimonials.edit', $t) }}">Edit</a>
        <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form></div></td></tr>
        @endforeach
    </table>
</div>
@endsection
