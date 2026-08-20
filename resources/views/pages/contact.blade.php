@extends('layouts.app')

@section('title', 'Contact — Money Maze')

@section('content')
@php
    $sc = $sc ?? [];
    $c = fn (string $key, string $fallback) => $sc[$key] ?? $fallback;
    $categories = [
        'Investment Solutions',
        'Tax Planning',
        'Income Tax Return Filing',
        'GST Registration',
        'GST Return Filing & Support',
        'Financial Organisation & Professional Support',
        'Media / Interviews / Speaking Engagements',
        'Book / Writing / Publication Related',
        'Other',
    ];
@endphp
<section class="simple-page-hero">
    <div class="container narrow-content">
        <p class="eyebrow">Get in touch</p>
        <h1>{{ $c('contact.title', 'Get in touch about investments, taxation, financial organisation, media enquiries or other professional matters.') }}</h1>
        <div class="gold-rule"></div>
        <p>{{ $c('contact.lead', 'Whether you are reaching out for a service-related query, a writing or a media request, or a general professional enquiry, you can use the form below or the contact details on this page.') }}</p>
    </div>
</section>

<section class="container contact-layout section-pad">
    <div class="contact-form-card">
        <p class="eyebrow">Send a message</p>
        <h2>Tell me what you need help with.</h2>
        @if (session('success'))
            <div class="form-errors" style="background:#eef7ec;border-color:#b3cfaa;color:#315a37">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="form-errors">{{ $errors->first() }}</div>
        @endif
        <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="form-grid">
                <label>Full name<input required name="name" value="{{ old('name') }}" autocomplete="name"></label>
                <label>Email address<input required type="email" name="email" value="{{ old('email') }}" autocomplete="email"></label>
                <label>Phone number <span>(optional)</span><input name="phone" value="{{ old('phone') }}"></label>
                <label>City <span>(optional)</span><input name="city" value="{{ old('city') }}"></label>
            </div>
            <label>What would you like to get in touch about?
                <select required name="category">
                    <option value="">Select an enquiry type</option>
                    @foreach ($categories as $cat)
                        <option @selected(old('category') === $cat)>{{ $cat }}</option>
                    @endforeach
                </select>
            </label>
            <label>Message<textarea required name="message" rows="6">{{ old('message') }}</textarea></label>
            <button class="button button-primary" type="submit">Send enquiry <span>→</span></button>
        </form>
    </div>
    <aside class="contact-aside">
        <div class="contact-detail">
            <span class="line-icon">@</span>
            <div>
                <p class="eyebrow">Email</p>
                <p>{{ $c('settings.email', 'hello@moneymaze.in') }}</p>
            </div>
        </div>
        <div class="contact-detail">
            <span class="line-icon">✆</span>
            <div>
                <p class="eyebrow">Phone</p>
                <p>{{ $c('settings.phone', '') ?: ' ' }}</p>
            </div>
        </div>
        <div class="contact-detail">
            <span class="line-icon">⌖</span>
            <div>
                <p class="eyebrow">Office</p>
                <p>{{ $c('contact.office', 'Ahmedabad, Gujarat, India') }}</p>
            </div>
        </div>
        <div class="contact-detail contact-detail-dark">
            <span class="line-icon">✦</span>
            <div>
                <p class="eyebrow">Closing note</p>
                <p>{{ $c('contact.closing', 'Thank you for visiting. If your query relates to the work I do, I’ll do my best to respond as soon as possible.') }}</p>
            </div>
        </div>
        <div class="contact-closing-actions">
            <a class="svch-btn-solid" href="{{ route('services') }}">{{ $c('contact.btn_services', 'Explore Services') }}</a>
            <a class="svch-btn-outline" href="{{ route('insights') }}">{{ $c('contact.btn_insights', 'Read Insights') }}</a>
        </div>
    </aside>
</section>
@endsection
