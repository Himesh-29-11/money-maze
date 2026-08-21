@extends('layouts.admin')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('content')
<div class="stats">
    <a class="stat" href="{{ route('admin.articles.index') }}"><b>{{ $counts['articles'] ?? '—' }}</b><span>Articles</span></a>
    <a class="stat" href="{{ route('admin.media.index') }}"><b>{{ $counts['media'] ?? '—' }}</b><span>Media entries</span></a>
    <a class="stat" href="{{ route('admin.books.index') }}"><b>{{ $counts['books'] ?? '—' }}</b><span>Books</span></a>
    <a class="stat" href="{{ route('admin.testimonials.index') }}"><b>{{ $counts['testimonials'] ?? '—' }}</b><span>Testimonials</span></a>
    <a class="stat" href="{{ route('admin.links.index') }}"><b>{{ $counts['links'] ?? '—' }}</b><span>Nav links</span></a>
    <a class="stat" href="{{ route('admin.messages') }}"><b>{{ $counts['messages'] ?? '—' }}</b><span>Messages</span></a>
</div>
<div class="card">
    <h2>Recent messages</h2>
    <p class="sub">Latest enquiries from the contact form. Long messages scroll inside their box.</p>
    <table class="msg-table">
        <tr><th>Name</th><th>Category</th><th>Message</th><th>Received</th></tr>
        @forelse ($messages as $m)
            <tr>
                <td>{{ $m->name }}<br><small>{{ $m->email }}</small></td>
                <td><span class="pill">{{ $m->category }}</span></td>
                <td><div class="msg-scroll">{{ $m->message }}</div></td>
                <td>{{ $m->created_at?->format('d M Y') }}</td>
            </tr>
        @empty
            <tr><td colspan="4">No messages yet.</td></tr>
        @endforelse
    </table>
</div>
@endsection
