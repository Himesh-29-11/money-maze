@php
    $isHome = request()->routeIs('home');
    $contentLinks = [
        ['label' => 'Home', 'href' => route('home')],
        ['label' => 'About', 'href' => route('about')],
        ['label' => 'Services', 'href' => route('services')],
        ['label' => 'Insights', 'href' => route('insights')],
        ['label' => 'Media & Features', 'href' => route('media')],
        ['label' => 'Books', 'href' => route('books')],
        ['label' => 'Testimonials', 'href' => route('testimonials')],
        ['label' => 'Resources', 'href' => route('resources')],
        ['label' => 'Contact', 'href' => route('contact')],
    ];
    $practiceLinks = [
        ['label' => 'Home', 'href' => route('home')],
        ['label' => 'About', 'href' => route('about')],
        ['label' => 'Services', 'href' => route('services')],
        ['label' => 'Who I Work With', 'href' => route('services').'#who-i-work-with'],
        ['label' => 'Media', 'href' => route('media')],
        ['label' => 'Resources', 'href' => route('resources')],
        ['label' => 'FAQs', 'href' => '#'],
        ['label' => 'Contact', 'href' => route('contact')],
    ];
    $links = $isHome ? $contentLinks : (request()->routeIs('about', 'services') ? $practiceLinks : $contentLinks);
@endphp
<header class="site-header {{ $isHome ? 'site-header-home' : 'site-header-inner' }}">
    <div class="container nav-shell">
        @if ($isHome)
            <a href="{{ route('home') }}" class="brand-lockup home-brand" aria-label="Mitali Mehta home">
                <span class="home-brand-mark" aria-hidden="true">MM</span>
                <span class="brand-copy"><strong>Mitali Mehta</strong><small>Personal Finance Professional</small></span>
            </a>
        @else
            <a href="{{ route('home') }}" class="brand-logo-lockup" aria-label="Money Maze home">
                <div class="logo-icon-wrap">
                    <svg class="logo-mark-svg" viewBox="0 0 100 115" width="34" height="39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="50,5 95,30 95,80 50,105 5,80 5,30" stroke="#a77e39" stroke-width="8" stroke-linejoin="round"/>
                        <path d="M50,5 V55 L95,80" stroke="#a77e39" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5,30 L50,55 L95,30" stroke="#a77e39" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5,80 L50,55" stroke="#a77e39" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M27.5,42.5 V67.5 L50,80" stroke="#a77e39" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="brand-text-wrap">
                    <span class="brand-title">MONEY MAZE</span>
                    <span class="brand-subtitle">Paving Your Financial Path</span>
                </div>
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
                <a href="{{ route('contact') }}" class="button button-primary nav-cta">Let's Connect <span aria-hidden="true">→</span></a>
            @endif
        </nav>
    </div>
</header>
