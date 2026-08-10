@props(['regulatoryNote' => null])
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <a href="{{ route('home') }}" class="brand-logo-lockup brand-logo-lockup-footer" aria-label="Mitali Mehta Home">
                <div class="logo-icon-wrap">
                    <svg viewBox="0 0 100 100" width="46" height="46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" stroke="#ffffff" stroke-width="1.5"/>
                        <circle cx="50" cy="50" r="40" stroke="#ffffff" stroke-width="0.75" stroke-dasharray="2 1"/>
                        <text x="50" y="58" font-family="'Playfair Display', Georgia, serif" font-size="34" font-style="italic" fill="#ffffff" text-anchor="middle">M</text>
                    </svg>
                </div>
                <div class="brand-text-wrap">
                    <span class="brand-title" style="color: #ffffff;">MITALI MEHTA</span>
                    <span class="brand-subtitle" style="color: #c8a25a;">Personal Finance Professional</span>
                </div>
            </a>
            <p class="brand-footer-motto">Clarity today. Freedom tomorrow.</p>
        </div>
        <div>
            <p class="footer-label">QUICK LINKS</p>
            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Me</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('resources') }}">Resources</a>
                <a href="{{ route('testimonials') }}">Testimonials</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
        <div>
            <p class="footer-label">CONNECT WITH ME</p>
            <div class="footer-socials" aria-label="Social links">
                <!-- SVG social icons matching the circles/outline -->
                <a href="#" aria-label="WhatsApp">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                </a>
                <a href="#" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                        <rect x="2" y="9" width="4" height="12"/>
                        <circle cx="4" cy="4" r="2"/>
                    </svg>
                </a>
                <a href="#" aria-label="YouTube">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25a29 29 0 0 0-.46-5.33z"/>
                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/>
                    </svg>
                </a>
                <a href="mailto:hello@moneymaze.in" aria-label="Email">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="footer-disclosure">
            <p class="footer-label">DISCLOSURE</p>
            <p>Mutual fund distribution services are offered as a SEBI-registered Mutual Fund Distributor. Other financial products and professional services are offered through the practice as applicable.</p>
        </div>
    </div>
</footer>
