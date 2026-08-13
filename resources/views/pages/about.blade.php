@extends('layouts.app')

@section('title', 'About Mitali — Money Maze')

@section('content')
<div class="about-v3">
    <!-- Top band: hero + a little about me -->
    <section class="ab-band ab-hero-band">
        <div class="ab-hero-left">
            <div class="ab-hero-copy">
                <h1>About <em>Mitali</em></h1>
                <p>{!! $sc['about.lead'] ?? 'Chartered Accountant, CFP professional, and founder of <strong>Money Maze</strong> — a practice built around thoughtful financial solutions, tax support and organised financial decision-making for individuals and professionals.' !!}</p>
            </div>
            <div class="ab-hero-photo">
                <img src="{{ asset('assets/crops/about-hero.jpg') }}" alt="Mitali Mehta, founder of Money Maze">
            </div>
        </div>
        <div class="ab-hero-right">
            <div class="ab-little-copy">
                <h2 class="ab-h2">A little about me</h2>
                <p>{!! $sc['about.little_p1'] ?? 'I am a finance professional with a background across personal finance, taxation and financial organisation, and the founder of <strong>Money Maze</strong>.' !!}</p>
                <p>{{ $sc['about.little_p2'] ?? 'Over the years, I have come to value one thing deeply: most people do not need more noise around money — they need more structure, more context and a more organised way of looking at their finances.' }}</p>
                <p>That belief is what shaped <strong>Money Maze</strong>.</p>
                <p>My work today brings together multiple parts of an individual's financial life — from investment solutions and tax-related support to financial organisation and practical money conversations — with the aim of making the overall process feel more structured, more thoughtful and easier to navigate.</p>
            </div>
            <div class="ab-little-photo">
                <img src="{{ asset('assets/crops/about-little.jpg') }}" alt="Calm desk with plant, notebooks and tea">
            </div>
        </div>
    </section>

    <!-- Middle band: why / background / capacity -->
    <section class="ab-band ab-mid-band">
        <div class="ab-maze-col">
            <div class="ab-side-img ab-maze-img">
                <img src="{{ asset('assets/crops/about-maze.jpg') }}" alt="Wooden maze with a golden ball finding its path">
            </div>
            <div class="ab-col-copy">
                <h2 class="ab-h2">Why “Money Maze”?</h2>
                <p class="ab-lead">Because for many people, money can genuinely feel like a maze.</p>
                <p>{{ $sc['about.maze_p2'] ?? 'There is often too much information, too many opinions, too many products, too many moving parts — and not enough clarity on what deserves attention, what can wait, and how different financial pieces fit together.' }}</p>
                <p>{{ $sc['about.maze_p3'] ?? 'Money Maze was built around the idea of making that journey feel more organised and less intimidating.' }}</p>
                <p>It reflects the kind of work I value — thoughtful, practical, grounded and focused on helping clients navigate financial complexity with more confidence and better structure.</p>
            </div>
        </div>
        <div class="ab-bg-col">
            <h2 class="ab-h2">Professional Background</h2>
            <div class="ab-cred-rows">
                <div><span class="ab-cred-badge">CA</span><span class="ab-cred-label">Chartered Accountant (CA)</span></div>
                <div><span class="ab-cred-badge">CFP</span><span class="ab-cred-label">Certified Financial Planner (CFP)</span></div>
                <div><span class="ab-cred-badge">QPFP</span><span class="ab-cred-label">Qualified Personal Finance Professional (QPFP)</span></div>
                <div><span class="ab-cred-badge">LLB</span><span class="ab-cred-label">Bachelor of Laws (LLB)</span></div>
            </div>
            <p class="ab-cred-footer">Each of these has shaped the way I look at financial matters — not as isolated tasks, but as interconnected decisions involving investments, taxes, structure, regulation and long-term priorities.</p>
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
                <h2 class="ab-h2">Current Professional Capacity</h2>
                <p>{{ $sc['about.capacity_p1'] ?? 'I am a SEBI-registered Mutual Fund Distributor (MFD).' }}</p>
                <p>{{ $sc['about.capacity_p2'] ?? 'My work includes facilitating access to mutual fund solutions and supporting clients with broader financial organisation, tax planning and related financial matters in a practical and structured manner.' }}</p>
            </div>
        </div>
    </section>

    <!-- Bottom band: approach + matters -->
    <section class="ab-band ab-low-band">
        <div class="ab-approach">
            <div class="ab-side-img">
                <img src="{{ asset('assets/crops/about-sprout.jpg') }}" alt="Young sprout growing through pebbles">
            </div>
            <div class="ab-col-copy">
                <h2 class="ab-h2">How I approach my work</h2>
                <p class="ab-lead">I believe financial work is rarely one-dimensional.</p>
                <p>Investment choices do not exist in isolation from taxes. Tax decisions affect cash flows. Cash flows affect what is available for future goals. Existing financial commitments influence what can realistically be done next.</p>
                <p>That is why I value a more connected and organised approach — one that looks at financial matters with context, practicality and a long-term view, rather than as isolated tasks.</p>
                <p>My attempt, through Money Maze, is to make these conversations and processes feel more structured, more understandable and easier to navigate over time.</p>
            </div>
        </div>
        <div class="ab-matters">
            <div class="ab-col-copy">
                <h2 class="ab-h2">What matters to me</h2>
                <p>{{ $sc['about.matters_p1'] ?? 'One of the things I value most about this profession is the opportunity to be part of meaningful financial journeys — whether that involves putting structure around finances, handling important compliance work, or simply being a steady point of contact in an area that often feels overwhelming.' }}</p>
                <p>To me, good financial work is not just about products or paperwork. It is also about trust, consistency, responsibility and bringing order to something that affects such an important part of people's lives.</p>
            </div>
            <div class="ab-side-img">
                <img src="{{ asset('assets/crops/about-compass.jpg') }}" alt="Brass compass resting on an old map journal">
            </div>
        </div>
    </section>

    <!-- Golden CTA band -->
    <section class="ab-cta-band">
        <div class="ab-cta-copy">
            <h2>Looking to connect?</h2>
            <p>If you’d like to know more about my work, services or areas of focus, feel free to get in touch.</p>
        </div>
        <div class="ab-cta-actions">
            <a class="ab-btn-dark" href="{{ route('services') }}">View Services</a>
            <a class="ab-btn-light" href="{{ route('contact') }}">Contact Me</a>
        </div>
        <div class="ab-cta-plant" aria-hidden="true">
            <svg viewBox="0 0 48 64" width="52" height="70" fill="none" stroke="#f2e5cd" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <path d="M24 30V16"/>
                <path d="M24 20c0-6 4-10 10-10 0 6-4 10-10 10z"/>
                <path d="M24 24c0-5-3.5-8-8.5-8 0 5 3.5 8 8.5 8z"/>
                <path d="M14 30h20l-2.5 16h-15z"/>
                <path d="M16 34h16"/>
            </svg>
        </div>
    </section>
</div>
@endsection
