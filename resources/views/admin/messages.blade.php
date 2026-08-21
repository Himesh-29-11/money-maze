@extends('layouts.admin')
@section('title', 'Messages')
@section('heading', 'Contact Messages')
@section('content')
<div class="card">
    <table class="msg-table">
        <tr><th>From</th><th>Category</th><th>Message</th><th>Received</th></tr>
        @forelse ($messages as $m)
        <tr><td><b>{{ $m->name }}</b><br><small>{{ $m->email }} @if($m->phone)· {{ $m->phone }}@endif @if($m->city)· {{ $m->city }}@endif</small></td>
        <td><span class="pill">{{ $m->category }}</span></td>
        <td><div class="msg-scroll">{{ $m->message }}</div></td><td>{{ $m->created_at?->format('d M Y H:i') }}</td></tr>
        @empty
        <tr><td colspan="4">No messages yet.</td></tr>
        @endforelse
    </table>
</div>
@endsection
