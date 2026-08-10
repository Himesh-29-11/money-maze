@props(['regulatoryNote' => null])
@php($isHome = request()->routeIs('home'))
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            @if ($isHome)
                <a href="{{ route('home') }}" class="brand-lockup brand-lockup-footer home-brand"><span class="home-brand-mark" aria-hidden="true">MC</span><span class="brand-copy"><strong>Mitali Mehta</strong><small>Personal Finance Professional</small></span></a>
            @else
                <a href="{{ route('home') }}" class="brand-image-lockup brand-image-lockup-footer"><img src="{{ asset('assets/money-maze-logo.jpg') }}" alt="Money Maze — Paving Your Financial Path"></a>
            @endif
            <p>Clarity today. Freedom tomorrow.</p>
        </div>
        <div>
            <p class="footer-label">Quick links</p>
            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('insights') }}">Insights</a>
                <a href="{{ route('resources') }}">Resources</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
        <div>
            <p class="footer-label">Connect with me</p>
            <div class="footer-socials" aria-label="Social links">
                <a href="#" aria-label="WhatsApp">WA</a>
                <a href="#" aria-label="LinkedIn">in</a>
                <a href="#" aria-label="YouTube">▶</a>
                <a href="mailto:hello@moneymaze.in" aria-label="Email">@</a>
            </div>
            <p class="footer-location">Ahmedabad, Gujarat, India</p>
        </div>
        <div class="footer-disclosure">
            <p class="footer-label">Disclosure</p>
            <p>{{ $regulatoryNote ?? 'Mutual fund distribution services are offered through the practice as applicable.' }}</p>
        </div>
    </div>
    <div class="footer-bottom container">
        <span>© {{ date('Y') }} Money Maze. All rights reserved.</span>
        <span>Designed for clarity. Built for confidence.</span>
    </div>
</footer>
