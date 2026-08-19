@extends('layouts.app')

@section('title', 'About Mitali Mehta — Money Maze')

@section('content')
@php
    $sc = $sc ?? [];
    $c = fn (string $key, string $fallback) => $sc[$key] ?? $fallback;
@endphp
<section class="ab-band ab-hero-band">
    <div class="ab-hero-left">
        <div class="ab-hero-copy">
            <h1>{{ $c('about.title', 'About') }} <em>{{ $c('about.name', 'Mitali Mehta') }}</em></h1>
        </div>
        <div class="ab-hero-photo">
            <img src="{{ asset('assets/crops/about-hero.jpg') }}" alt="Mitali Mehta, founder of Money Maze">
        </div>
    </div>
    <div class="ab-hero-right">
        <div class="ab-little-copy">
            <h2 class="ab-h2">{{ $c('about.journey_title', 'My Professional Journey') }}</h2>
            <p>{{ $c('about.journey_p1', 'My background spans three disciplines that shape how I work today: finance, taxation and law.') }}</p>
            <p>{{ $c('about.journey_p2', 'As a Chartered Accountant, I bring a strong grounding in taxation, compliance and documentation. As a Certified Financial Planner, I bring structured, long-term thinking to personal finance and investing. My legal training adds a third lens — useful in situations where documentation, interpretation and financial decisions intersect.') }}</p>
            <p>{{ $c('about.journey_p3', 'Over time these strands have come together naturally, letting me look at a client’s financial needs more holistically rather than one requirement at a time.') }}</p>
        </div>
        <div class="ab-little-photo">
            <img src="{{ asset('assets/crops/about-little.jpg') }}" alt="Calm desk with plant, notebooks and tea">
        </div>
    </div>
</section>

<section class="ab-band ab-mid-band">
    <div class="ab-maze-col">
        <div class="ab-side-img">
            <img src="{{ asset('assets/crops/about-maze.jpg') }}" alt="Cream maze with a golden ball finding its path">
        </div>
        <div class="ab-col-copy">
            <h2 class="ab-h2">{{ $c('about.today_title', 'What My Work Looks Like Today') }}</h2>
            <p>{{ $c('about.today_p1', 'Today, my work spans investment execution, tax and compliance support, financial organisation and personal finance content across writing, speaking and educational formats.') }}</p>
            <p>{{ $c('about.today_p2', 'This mix keeps the work connected to real questions, rather than narrowing it to one type of service or to one type of client.') }}</p>
        </div>
    </div>
    <div class="ab-bg-col">
        <h2 class="ab-h2">{{ $c('about.background_title', 'Professional Background') }}</h2>
        <div class="ab-cred-rows">
            <div><span class="ab-cred-badge">CA</span><span class="ab-cred-label">Chartered Accountant (CA)</span></div>
            <div><span class="ab-cred-badge">CFP</span><span class="ab-cred-label">Certified Financial Planner (CFP)</span></div>
            <div><span class="ab-cred-badge">QPFP</span><span class="ab-cred-label">Qualified Personal Finance Professional (QPFP)</span></div>
            <div><span class="ab-cred-badge">LLB</span><span class="ab-cred-label">Bachelor of Laws (LLB)</span></div>
        </div>
        <p>{{ $c('about.background_note', 'Each of these has shaped the way I look at financial matters — not as isolated tasks, but as interconnected decisions involving investments, taxes, structure, regulation and long-term priorities.') }}</p>
    </div>
    <div class="ab-cap-col">
        <div class="ab-cap-icon">
            <svg viewBox="0 0 64 64" width="96" height="96" fill="none" stroke="#a77e39" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M32 5l12 4.2V20c0 9.6-5.6 15.8-12 19-6.4-3.2-12-9.4-12-19V9.2z"/>
                <path d="M26.5 19.5l4 4 7.5-8"/>
                <path d="M10 47c7-2.5 12-2.5 16 0s9 2.5 13 .5l7.5-3.5c3-1.4 5.5 1.8 3.4 4.2-4.2 4.6-9.6 7.6-15.4 8.8-6.3 1.3-12.6.2-18-3L10 50z"/>
                <path d="M10 47v6"/>
                <path d="M6 50h4"/>
            </svg>
        </div>
        <div class="ab-cap-copy">
            <h2 class="ab-h2">{{ $c('about.why_title', 'Why This Work Matters to Me') }}</h2>
            <p>{{ $c('about.why_p1', 'Money decisions often cluster around moments of change — a first job, a growing family, retirement, a new business, or simply the realisation that one’s finances have become more scattered than they would like.') }}</p>
            <p>{{ $c('about.why_p2', 'What draws me to this work isn’t only the technical side of finance, but the part it plays in helping people feel more prepared and more in control of decisions that genuinely affect their lives.') }}</p>
        </div>
    </div>
</section>

<section class="ab-band ab-low-band">
    <div class="ab-approach">
        <div class="ab-side-img">
            <img src="{{ asset('assets/crops/about-sprout.jpg') }}" alt="Young sprout growing through pebbles">
        </div>
        <div class="ab-col-copy">
            <h2 class="ab-h2">{{ $c('about.writing_title', 'Writing, Media & Authorship') }}</h2>
            <p>{{ $c('about.writing_p1', 'I also write on personal finance for publications, appear across television and other media platforms, and am the author of The Second Half of Zindagi!, a book on retirement planning.') }}</p>
            <p>{!! $c('about.writing_p2', 'You can find more on <a href="'.route('insights').'">Insights</a>, <a href="'.route('media').'">Media &amp; Features</a> and <a href="'.route('books').'">Books</a>.') !!}</p>
        </div>
    </div>
    <div class="ab-matters">
        <div class="ab-col-copy">
            <h2 class="ab-h2">{{ $c('about.closing_title', 'Closing Note') }}</h2>
            <p>{{ $c('about.closing_p1', 'At the core, this is work about making finance more usable — whether the need is investment-related, tax-related, documentation-heavy, retirement-focused or educational.') }}</p>
            <p>{{ $c('about.closing_p2', 'I see financial work as something that should leave people more aware, more prepared and more confident in their decisions.') }}</p>
            <div class="hero-actions" style="margin-top:18px;">
                <a class="svch-btn-solid" href="{{ route('services') }}">{{ $c('about.btn_services', 'Explore Services') }}</a>
                <a class="svch-btn-outline" href="{{ route('contact') }}">{{ $c('about.btn_contact', 'Get in Touch') }}</a>
            </div>
        </div>
        <div class="ab-side-img">
            <img src="{{ asset('assets/crops/about-compass.jpg') }}" alt="Brass compass resting on an old map journal">
        </div>
    </div>
</section>
@endsection
