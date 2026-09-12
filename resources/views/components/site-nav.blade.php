@props(['navLinks' => [], 'sc' => []])
@php
    $defaultLinks = [
        ['label' => 'Home', 'href' => route('home')],
        ['label' => 'About', 'href' => route('about')],
        ['label' => 'Services', 'href' => route('services'), 'mega' => true],
        ['label' => 'Insights', 'href' => route('insights')],
        ['label' => 'Media & Features', 'href' => route('media')],
        ['label' => 'Books', 'href' => route('books')],
        ['label' => 'Testimonials', 'href' => route('testimonials')],
        ['label' => 'Resources', 'href' => route('resources')],
        ['label' => 'Contact', 'href' => route('contact')],
    ];
    $links = ! empty($navLinks ?? [])
        ? collect($navLinks)->map(fn ($l) => [
            'label' => $l['label'],
            'href' => $l['url'],
            'mega' => ($l['label'] ?? '') === 'Services',
        ])->all()
        : $defaultLinks;

    $email = $sc['settings.email'] ?? 'hello@moneymaze.in';
    $phone = trim($sc['settings.phone'] ?? '') ?: '+91 98765 43210';
    $tagline = $sc['settings.footer_tagline'] ?? 'Clarity Today. Freedom Tomorrow.';
    $linkedin = $sc['settings.linkedin'] ?? '#';
    $instagram = $sc['settings.instagram'] ?? '#';
    $youtube = $sc['settings.youtube'] ?? '#';

    $contactWithCategory = fn (string $category) => route('contact').'?category='.urlencode($category);
    $megaServices = [
        ['title' => 'Financial Planning', 'desc' => 'Plan your goals with confidence.', 'href' => route('services').'#how-i-work', 'icon' => 'chart'],
        ['title' => 'Investment Guidance', 'desc' => 'Build and grow your wealth.', 'href' => route('services').'#investment-solutions', 'icon' => 'leaf'],
        ['title' => 'Retirement Planning', 'desc' => 'A secure tomorrow, today.', 'href' => route('calculators.show', 'retirement'), 'icon' => 'umbrella'],
        ['title' => 'Tax Planning', 'desc' => 'Smarter tax. Greater savings.', 'href' => route('services').'#taxation-compliance', 'icon' => 'percent'],
        ['title' => 'Wealth Management', 'desc' => 'Personalised wealth strategies.', 'href' => route('services').'#investment-solutions', 'icon' => 'pie'],
        ['title' => 'Goal-Based Planning', 'desc' => 'Turn your dreams into plans.', 'href' => $contactWithCategory('Investment Solutions'), 'icon' => 'target'],
        ['title' => 'Estate Planning', 'desc' => 'Protect what matters.', 'href' => route('resources').'#res2-checks', 'icon' => 'document'],
        ['title' => 'Consultation', 'desc' => 'Expert advice, personalised for you.', 'href' => $contactWithCategory('Other'), 'icon' => 'chat'],
    ];
@endphp
<header class="site-header header-v2">
    <div class="header-utility">
        <div class="container header-utility-inner">
            <div class="header-utility-left">
                <svg class="header-utility-leaf" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="M8 11l2 2 4-4"/>
                </svg>
                <span>{{ $tagline }}</span>
            </div>
            <div class="header-utility-center">
                <a href="mailto:{{ $email }}" class="header-utility-contact">
                    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    {{ $email }}
                </a>
                <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="header-utility-contact">
                    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.81.3 1.6.57 2.36a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.72-1.14a2 2 0 0 1 2.11-.45c.76.27 1.55.45 2.36.57A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    {{ $phone }}
                </a>
            </div>
            <div class="header-utility-right">
                <div class="header-utility-socials" aria-label="Social links">
                    <a href="{{ $linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="{{ $instagram }}" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="{{ $youtube }}" target="_blank" rel="noopener" aria-label="YouTube">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25a29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                    </a>
                </div>
                <a class="header-utility-cta" href="{{ route('contact') }}">Book a Free Consultation <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>

    <div class="header-main">
        <div class="container nav-shell">
            <a href="{{ route('home') }}" class="mm-logo-lockup" aria-label="Money Maze home">
                <img class="mm-logo-img" src="{{ asset($sc['settings.nav_logo'] ?? 'assets/money-maze-logo.png') }}" alt="Money Maze — Paving Your Financial Path">
            </a>

            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation">
                <span></span><span></span><span></span>
            </button>

            <nav id="primary-navigation" class="primary-nav" aria-label="Primary navigation">
                @foreach ($links as $link)
                    @php($activeHref = \Illuminate\Support\Str::before($link['href'], '#'))
                    @php($isActive = request()->url() === $activeHref || (($link['mega'] ?? false) && request()->routeIs('services')))
                    @if (! empty($link['mega']))
                        <div class="nav-item-mega {{ $isActive ? 'is-open' : '' }}">
                            <a href="{{ $link['href'] }}" class="nav-link nav-link-mega {{ $isActive ? 'is-active' : '' }}" aria-haspopup="true" aria-expanded="false" data-mega-trigger>
                                {{ $link['label'] }}
                                <svg class="nav-chevron" viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                            </a>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" class="nav-link {{ $isActive ? 'is-active' : '' }}">{{ $link['label'] }}</a>
                    @endif
                @endforeach
            </nav>

            <div class="nav-actions">
                <button type="button" class="nav-search-btn" aria-label="Search" aria-expanded="false" aria-controls="header-search-panel">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="M20 20l-3.5-3.5"/>
                    </svg>
                </button>
                <a class="nav-connect-btn" href="{{ route('contact') }}">Let's Connect <span aria-hidden="true">→</span></a>
            </div>
        </div>

        <div class="services-mega-menu" id="services-mega-menu" aria-label="Services menu">
            <div class="services-mega-inner container">
                <div class="services-mega-intro">
                    <p class="services-mega-eyebrow">Our Services</p>
                    <h3>Financial Clarity for a Brighter Future</h3>
                    <p>Personalised solutions across investments, taxation and financial organisation — designed to help you move forward with confidence.</p>
                    <a class="services-mega-view-all" href="{{ route('services') }}">View All Services <span aria-hidden="true">→</span></a>
                    <div class="services-mega-leaves" aria-hidden="true"></div>
                </div>
                <div class="services-mega-grid">
                    @foreach ($megaServices as $service)
                        <a class="services-mega-item" href="{{ $service['href'] }}">
                            <span class="services-mega-icon">
                                @include('partials.nav-service-icon', ['icon' => $service['icon']])
                            </span>
                            <span class="services-mega-copy">
                                <b>{{ $service['title'] }}</b>
                                <small>{{ $service['desc'] }}</small>
                            </span>
                        </a>
                    @endforeach
                </div>
                <div class="services-mega-cta">
                    <p class="services-mega-eyebrow">Why Money Maze</p>
                    <h3>Guiding You Towards Financial Freedom</h3>
                    <ul>
                        <li><span aria-hidden="true">✓</span> Certified &amp; Experienced</li>
                        <li><span aria-hidden="true">✓</span> Personalised Solutions</li>
                        <li><span aria-hidden="true">✓</span> Trusted by Many Families</li>
                    </ul>
                    <a class="services-mega-schedule" href="{{ route('contact') }}">Schedule a Call <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>

        <div class="header-search-panel" id="header-search-panel" hidden>
            <div class="container">
                <form class="header-search-form" action="{{ route('insights') }}" method="get" role="search">
                    <label class="visually-hidden" for="header-search-input">Search insights</label>
                    <input id="header-search-input" type="search" name="q" placeholder="Search articles, topics and resources..." autocomplete="off">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</header>
