@extends('layouts.app')

@section('title', 'Contact — Money Maze')

@section('content')
<section class="simple-page-hero"><div class="container narrow-content"><p class="eyebrow">Get in touch</p><h1>Let’s talk about investments, taxation, financial organisation or other professional matters.</h1><div class="gold-rule"></div><p>Whether you are reaching out for a service-related query, a writing or media request, or a general professional enquiry, you can use the form below.</p></div></section>
<section class="container contact-layout section-pad">
    <div class="contact-form-card">
        <p class="eyebrow">Send a message</p><h2>Tell me what you need help with.</h2>
        @if ($errors->any())<div class="form-errors"><strong>Please check the form:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('contact.store') }}" class="contact-form">@csrf
            <div class="form-grid"><label>Full name<input type="text" name="name" value="{{ old('name') }}" required autocomplete="name"></label><label>Email address<input type="email" name="email" value="{{ old('email') }}" required autocomplete="email"></label><label>Phone number <span>(optional)</span><input type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel"></label><label>City <span>(optional)</span><input type="text" name="city" value="{{ old('city') }}" autocomplete="address-level2"></label></div>
            <label>What would you like to get in touch about?<select name="category" required><option value="">Select an enquiry type</option>@foreach (['Investment Solutions','Tax Planning','Income Tax Return Filing','GST Registration','GST Return Filing & Support','Financial Organisation & Professional Support','Media / Interviews / Speaking Engagements','Book / Writing / Publication Related','Other'] as $category)<option {{ old('category') === $category ? 'selected' : '' }}>{{ $category }}</option>@endforeach</select></label>
            <label>Message<textarea name="message" rows="6" required>{{ old('message') }}</textarea></label>
            <button class="button button-primary" type="submit">Send enquiry <span>→</span></button>
        </form>
    </div>
    <aside class="contact-aside"><div class="contact-detail"><span class="line-icon">@</span><div><p class="eyebrow">Email</p><p>Use the form and I’ll respond with the best way to continue the conversation.</p></div></div><div class="contact-detail"><span class="line-icon">⌖</span><div><p class="eyebrow">Office</p><p>{{ $sc['contact.office'] ?? 'Ahmedabad, Gujarat, India' }}</p></div></div><div class="contact-detail contact-detail-dark"><span class="line-icon">✦</span><div><p class="eyebrow">A closing note</p><p>Thank you for visiting. If your query relates to the work I do, I’ll do my best to respond as soon as possible.</p></div></div></aside>
</section>
@endsection
