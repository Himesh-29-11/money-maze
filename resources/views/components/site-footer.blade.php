@props(['regulatoryNote' => null, 'navLinks' => [], 'sc' => []])
@php
    $quickLinks = ! empty($navLinks ?? [])
        ? collect($navLinks)->map(fn ($l) => ['label' => $l['label'], 'href' => $l['url']])->all()
        : [
            ['label' => 'Home', 'href' => route('home')],
            ['label' => 'About Us', 'href' => route('about')],
            ['label' => 'Services', 'href' => route('services')],
            ['label' => 'Insights', 'href' => route('insights')],
            ['label' => 'Media & Features', 'href' => route('media')],
            ['label' => 'Books', 'href' => route('books')],
            ['label' => 'Testimonials', 'href' => route('testimonials')],
            ['label' => 'Contact', 'href' => route('contact')],
        ];
    $contactWithCategory = fn (string $category) => route('contact').'?category='.urlencode($category);
    $serviceLinks = [
        ['label' => 'Financial Planning', 'href' => route('services').'#how-i-work'],
        ['label' => 'Investment Guidance', 'href' => route('services').'#investment-solutions'],
        ['label' => 'Retirement Planning', 'href' => route('calculators.show', 'retirement')],
        ['label' => 'Tax Planning', 'href' => route('services').'#taxation-compliance'],
        ['label' => 'Wealth Management', 'href' => route('services').'#investment-solutions'],
        ['label' => 'Goal-Based Planning', 'href' => $contactWithCategory('Investment Solutions')],
        ['label' => 'Estate Planning', 'href' => route('resources').'#res2-checks'],
        ['label' => 'Consultation', 'href' => $contactWithCategory('Other')],
    ];
    $resourceLinks = [
        ['label' => 'Articles & Blogs', 'href' => route('insights')],
        ['label' => 'Guides & Tools', 'href' => route('resources')],
        ['label' => 'FAQs', 'href' => route('contact')],
        ['label' => 'Downloadable Resources', 'href' => route('resources').'#res2-checks'],
        ['label' => 'Client Resources', 'href' => route('resources')],
        ['label' => 'Financial Calculators', 'href' => route('resources').'#res2-calcs'],
        ['label' => 'Glossary', 'href' => route('resources')],
        ['label' => 'Support', 'href' => route('contact')],
    ];
    $email = $sc['settings.email'] ?? 'hello@moneymaze.in';
    $footerLogo = $sc['settings.footer_logo'] ?? 'assets/money-maze-logo-footer.png';
    $footerTagline = $sc['settings.footer_tagline'] ?? 'Clarity today. Freedom tomorrow.';
    $footerAbout = $sc['settings.footer_about'] ?? 'Money Maze provides simple, practical and actionable insights to help you make smarter financial decisions and build a brighter future.';
    $footerMotto = $sc['settings.footer_motto'] ?? 'Plan · Grow · Secure · Thrive';
    $linkedin = $sc['settings.linkedin'] ?? '#';
    $instagram = $sc['settings.instagram'] ?? '#';
    $youtube = $sc['settings.youtube'] ?? '#';
@endphp
<footer class="site-footer">
    <div class="footer-decor footer-decor-left" aria-hidden="true"></div>
    <div class="footer-decor footer-decor-right" aria-hidden="true"></div>

    <div class="container footer-grid">
        <div class="footer-col footer-col-brand">
            <a href="{{ route('home') }}" class="mm-logo-lockup mm-logo-lockup-footer" aria-label="Money Maze home">
                <img class="mm-logo-img mm-logo-footer" src="{{ asset($footerLogo) }}" alt="Money Maze — Paving Your Financial Path">
            </a>
            <p class="brand-footer-motto">{{ $footerTagline }}</p>
            <p class="footer-brand-about">{{ $footerAbout }}</p>
            <div class="footer-socials" aria-label="Social links">
                <a href="{{ $linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                        <rect x="2" y="9" width="4" height="12"/>
                        <circle cx="4" cy="4" r="2"/>
                    </svg>
                </a>
                <a href="{{ $instagram }}" target="_blank" rel="noopener" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                </a>
                <a href="{{ $youtube }}" target="_blank" rel="noopener" aria-label="YouTube">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25a29 29 0 0 0-.46-5.33z"/>
                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/>
                    </svg>
                </a>
                <a href="mailto:{{ $email }}" aria-label="Email">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </a>
            </div>
            <p class="footer-brand-script">{{ $footerMotto }}</p>
        </div>

        <div class="footer-col footer-col-links">
            <h3 class="footer-heading">Quick Links</h3>
            <ul class="footer-link-list">
                @foreach ($quickLinks as $link)
                    <li><a href="{{ $link['href'] }}"><span>{{ $link['label'] }}</span><span class="footer-chevron" aria-hidden="true">›</span></a></li>
                @endforeach
            </ul>
        </div>

        <div class="footer-col footer-col-services">
            <h3 class="footer-heading">Our Services</h3>
            <ul class="footer-link-list">
                @foreach ($serviceLinks as $link)
                    <li><a href="{{ $link['href'] }}"><span>{{ $link['label'] }}</span><span class="footer-chevron" aria-hidden="true">›</span></a></li>
                @endforeach
            </ul>
        </div>

        <div class="footer-col footer-col-resources">
            <h3 class="footer-heading">Resources</h3>
            <ul class="footer-link-list">
                @foreach ($resourceLinks as $link)
                    <li><a href="{{ $link['href'] }}"><span>{{ $link['label'] }}</span><span class="footer-chevron" aria-hidden="true">›</span></a></li>
                @endforeach
            </ul>
        </div>

        <div class="footer-col footer-col-newsletter">
            <h3 class="footer-heading">Stay Informed</h3>
            <p class="footer-newsletter-lead">Get the latest insights, tips and updates delivered to your inbox.</p>
            <form class="footer-newsletter-form" action="{{ route('contact') }}" method="get">
                <label class="footer-newsletter-field">
                    <span class="visually-hidden">Email address</span>
                    <input type="email" name="email" placeholder="Enter your email address" required autocomplete="email">
                </label>
                <button type="submit" class="footer-newsletter-btn">Subscribe <span aria-hidden="true">→</span></button>
            </form>
            <p class="footer-newsletter-privacy">
                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="5" y="11" width="14" height="10" rx="2"/>
                    <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
                </svg>
                We respect your privacy. No spam, ever.
            </p>
        </div>
    </div>

    <div class="footer-bottom container">
        <span class="footer-copy">© {{ date('Y') }} Money Maze. All rights reserved.</span>
        <nav class="footer-legal" aria-label="Legal links">
            <a href="{{ route('contact') }}">Privacy Policy</a>
            <span aria-hidden="true">|</span>
            <a href="{{ route('contact') }}">Terms of Service</a>
            <span aria-hidden="true">|</span>
            <a href="{{ route('services') }}">Disclaimer</a>
            <span aria-hidden="true">|</span>
            <a href="{{ route('home') }}">Sitemap</a>
        </nav>
        <a href="#main-content" class="footer-back-top">
            <span class="footer-back-top-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19V5"/>
                    <path d="M5 12l7-7 7 7"/>
                </svg>
            </span>
            Back to Top
        </a>
    </div>
</footer>
