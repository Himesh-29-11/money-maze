@php
    $defaultLinks = [
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
    $links = ! empty($navLinks ?? [])
        ? collect($navLinks)->map(fn ($l) => ['label' => $l['label'], 'href' => $l['url']])->all()
        : $defaultLinks;
@endphp
<header class="site-header">
    <div class="container nav-shell">
        <a href="{{ route('home') }}" class="mm-logo-lockup" aria-label="Money Maze home">
            <img class="mm-logo-img" src="{{ asset('assets/money-maze-logo.png') }}" alt="Money Maze — Paving Your Financial Path">
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Open navigation">
            <span></span><span></span><span></span>
        </button>
        <nav id="primary-navigation" class="primary-nav" aria-label="Primary navigation">
            @foreach ($links as $link)
                @php($activeHref = \Illuminate\Support\Str::before($link['href'], '#'))
                <a href="{{ $link['href'] }}" class="{{ request()->url() === $activeHref ? 'is-active' : '' }}">{{ $link['label'] }}</a>
            @endforeach
        </nav>
    </div>
</header>
