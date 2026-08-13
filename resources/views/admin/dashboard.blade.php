@extends('layouts.admin')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('content')
<div class="stats">
    <div class="stat"><b>{{ $counts['articles'] ?? '—' }}</b><span>Articles</span></div>
    <div class="stat"><b>{{ $counts['media'] ?? '—' }}</b><span>Media entries</span></div>
    <div class="stat"><b>{{ $counts['books'] ?? '—' }}</b><span>Books</span></div>
    <div class="stat"><b>{{ $counts['testimonials'] ?? '—' }}</b><span>Testimonials</span></div>
    <div class="stat"><b>{{ $counts['links'] ?? '—' }}</b><span>Nav links</span></div>
    <div class="stat"><b>{{ $counts['messages'] ?? '—' }}</b><span>Messages</span></div>
</div>
<div class="card">
    <h2>Recent messages</h2>
    <p class="sub">Latest enquiries from the contact form.</p>
    <table>
        <tr><th>Name</th><th>Category</th><th>Message</th><th>Received</th></tr>
        @forelse ($messages as $m)
            <tr><td>{{ $m->name }}<br><small>{{ $m->email }}</small></td><td><span class="pill">{{ $m->category }}</span></td><td>{{ \Illuminate\Support\Str::limit($m->message, 90) }}</td><td>{{ $m->created_at?->format('d M Y') }}</td></tr>
        @empty
            <tr><td colspan="4">No messages yet.</td></tr>
        @endforelse
    </table>
</div>
@endsection
