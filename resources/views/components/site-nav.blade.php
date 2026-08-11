@php
    $isHome = request()->routeIs('home');
    $isAbout = request()->routeIs('about');
    $links = $isAbout
        ? [
            ['label' => 'Home', 'href' => route('home')],
            ['label' => 'About', 'href' => route('about')],
            ['label' => 'Services', 'href' => route('services')],
            ['label' => 'Who I Work With', 'href' => route('services') . '#who-i-work-with'],
            ['label' => 'Media', 'href' => route('media')],
            ['label' => 'Resources', 'href' => route('resources')],
            ['label' => 'FAQs', 'href' => '#'],
            ['label' => 'Contact', 'href' => route('contact')],
        ]
        : ($isHome
        ? [
            ['label' => 'Home', 'href' => route('home')],
            ['label' => 'About Me', 'href' => route('about')],
            ['label' => 'Services', 'href' => route('services')],
            ['label' => 'Insights', 'href' => route('insights')],
            ['label' => 'Media & Features', 'href' => route('media')],
            ['label' => 'Resources', 'href' => route('resources')],
            ['label' => 'Testimonials', 'href' => route('testimonials')],
        ]
        : [
            ['label' => 'Home', 'href' => route('home')],
            ['label' => 'About', 'href' => route('about')],
            ['label' => 'Services', 'href' => route('services')],
            ['label' => 'Insights', 'href' => route('insights')],
            ['label' => 'Media & Features', 'href' => route('media')],
            ['label' => 'Books', 'href' => route('books')],
            ['label' => 'Testimonials', 'href' => route('testimonials')],
            ['label' => 'Resources', 'href' => route('resources')],
            ['label' => 'Contact', 'href' => route('contact')],
        ]);
@endphp
<header class="site-header @if ($isAbout) site-header-overlay @endif">
    <div class="container nav-shell">
        @if ($isHome)
            <a href="{{ route('home') }}" class="brand-logo-lockup" aria-label="Mitali Mehta Home">
                <div class="logo-icon-wrap">
                    <svg viewBox="0 0 100 100" width="46" height="46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" stroke="#c8a25a" stroke-width="1.5"/>
                        <circle cx="50" cy="50" r="40" stroke="#c8a25a" stroke-width="0.75" stroke-dasharray="2 1"/>
                        <text x="50" y="58" font-family="'Playfair Display', Georgia, serif" font-size="34" font-style="italic" fill="#133d34" text-anchor="middle">M</text>
                    </svg>
                </div>
                <div class="brand-text-wrap">
                    <span class="brand-title">MITALI MEHTA</span>
                    <span class="brand-subtitle">Personal Finance Professional</span>
                </div>
            </a>
        @else
            <a href="{{ route('home') }}" class="mm-logo-lockup" aria-label="Money Maze home">
                <svg class="mm-logo" viewBox="0 0 480 110" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <g stroke="currentColor" stroke-width="5">
                        <path d="M55 6l44 25v50l-44 25-44-25V31z"/>
                        <path d="M55 18l33 19v38l-33 19-33-19V37z" stroke-width="3"/>
                        <path d="M36 76V52l19-11 19 11v24" stroke-width="5"/>
                        <path d="M45 76V60l10-6 10 6v16" stroke-width="4"/>
                    </g>
                    <text x="122" y="56" font-family="Cinzel, Georgia, serif" font-size="34" font-weight="700" letter-spacing="5" fill="currentColor">MONEY MAZE</text>
                    <rect x="122" y="68" width="330" height="2.5" fill="currentColor"/>
                    <text x="122" y="95" font-family="Lato, Arial, sans-serif" font-size="18" letter-spacing="2" fill="currentColor" opacity=".85">Paving Your Financial Path</text>
                </svg>
            </a>
        @endif
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation">
            <span></span><span></span><span></span>
        </button>
        <nav id="primary-navigation" class="primary-nav" aria-label="Primary navigation">
            @foreach ($links as $link)
                @php($activeHref = \Illuminate\Support\Str::before($link['href'], '#'))
                <a href="{{ $link['href'] }}" class="{{ request()->url() === $activeHref ? 'is-active' : '' }}">{{ $link['label'] }}</a>
            @endforeach
            @if ($isHome)
                <a href="{{ route('contact') }}" class="button button-primary nav-cta">Let's Connect</a>
            @endif
        </nav>
    </div>
</header>
