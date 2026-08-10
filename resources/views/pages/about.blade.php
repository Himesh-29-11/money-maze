@extends('layouts.app')

@section('title', 'About Mitali — Money Maze')

@section('content')
<div class="about-page-v2">
    <!-- Top Row (2 Columns): Hero Banner + A Little About Me -->
    <div class="about-top-grid">
        <section class="about-hero-card">
            <div class="about-hero-text">
                <p class="eyebrow">ABOUT</p>
                <h1>About <span>Mitali</span></h1>
                <p class="hero-subtext">
                    <strong>Chartered Accountant, CFP professional, and founder of Money Maze</strong> — a practice built around thoughtful financial solutions, tax support and organised financial decision-making for individuals and professionals.
                </p>
            </div>
            <div class="about-hero-image-wrap">
                <img src="{{ asset('assets/mitali-profile-glasses.png') }}" alt="Mitali Mehta, CA, CFP">
            </div>
        </section>

        <section class="about-little-card">
            <div class="about-card-content">
                <p class="eyebrow">A LITTLE ABOUT ME</p>
                <h2>Finance should feel more structured, more thoughtful and easier to navigate.</h2>
                <p>I am a finance professional with a background across personal finance, taxation and financial organisation, and the founder of <strong>Money Maze</strong>.</p>
                <p>Over the years, I have come to value one thing deeply: most people do not need more noise around money — they need more structure, more context and a more organised way of looking at their finances.</p>
                <p>That belief is what shaped Money Maze.</p>
                <p>My work today brings together multiple parts of an individual's financial life — from investment solutions and tax-related support to financial organisation and practical money conversations — with the aim of making the overall process feel more structured, more thoughtful and easier to navigate.</p>
            </div>
            <div class="about-little-photo">
                <img src="{{ asset('assets/crops/about-little.jpg') }}" alt="Warm aesthetic desk with plant and journal">
            </div>
        </section>
    </div>

    <!-- Middle Row (3 Columns): Why Money Maze? + Professional Background + Current Capacity -->
    <div class="about-middle-grid">
        <section class="about-grid-card about-maze-card">
            <div class="about-card-header">
                <h3>Why “Money Maze”?</h3>
            </div>
            <div class="about-card-body">
                <p class="highlight-lead">Because for many people, money can genuinely feel like a maze.</p>
                <p>There is often too much information, too many opinions, too many products, too many moving parts — and not enough clarity on what deserves attention, what can wait, and how different financial pieces fit together.</p>
                <p>Money Maze was built around the idea of making that journey feel more organised and less intimidating.</p>
                <p>It reflects the kind of work I value — thoughtful, practical, grounded and focused on helping clients navigate financial complexity with more confidence and better structure.</p>
            </div>
            <div class="about-card-visual">
                <img src="{{ asset('assets/crops/about-maze.jpg') }}" alt="3D maze with golden ball finding path">
            </div>
        </section>

        <section class="about-grid-card about-credentials-card">
            <div class="about-card-header">
                <h3>Professional Background</h3>
            </div>
            <div class="about-card-body">
                <div class="credential-badge-list">
                    <div class="badge-item">
                        <span class="badge-pill">CA</span>
                        <span class="badge-text">Chartered Accountant (CA)</span>
                    </div>
                    <div class="badge-item">
                        <span class="badge-pill">CFP</span>
                        <span class="badge-text">Certified Financial Planner (CFP)</span>
                    </div>
                    <div class="badge-item">
                        <span class="badge-pill">QFPP</span>
                        <span class="badge-text">Qualified Personal Finance Professional (QFPP)</span>
                    </div>
                    <div class="badge-item">
                        <span class="badge-pill">LLB</span>
                        <span class="badge-text">Bachelor of Laws (LLB)</span>
                    </div>
                </div>
                <p class="credential-footer-text">Each of these has shaped the way I look at financial matters — not as isolated tasks, but as interconnected decisions involving investments, taxes, structure, regulation and long-term priorities.</p>
            </div>
        </section>

        <section class="about-grid-card about-capacity-card">
            <div class="capacity-icon-wrap">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#a77e39" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
            </div>
            <div class="about-card-header">
                <h3>Current Professional Capacity</h3>
            </div>
            <div class="about-card-body">
                <p class="capacity-bold">I am a SEBI-registered Mutual Fund Distributor (MFD).</p>
                <p>My work includes facilitating access to mutual fund solutions and supporting clients with broader financial organisation, tax planning and related financial matters in a practical and structured manner.</p>
            </div>
        </section>
    </div>

    <!-- Bottom Row (2 Columns): How I approach my work + What matters to me -->
    <div class="about-bottom-grid">
        <section class="about-grid-card about-approach-card">
            <div class="card-split">
                <div class="card-side-image">
                    <img src="{{ asset('assets/crops/about-sprout.jpg') }}" alt="Green sprout growing from pebbles">
                </div>
                <div class="card-content-wrap">
                    <h3>How I approach my work</h3>
                    <p class="approach-lead">I believe financial work is rarely one-dimensional.</p>
                    <p>Investment choices do not exist in isolation from taxes. Tax decisions affect cash flows. Cash flows affect what is available for future goals. Existing financial commitments influence what can realistically be done next.</p>
                    <p>That is why I value a more connected and organised approach — one that looks at financial matters with context, practicality and a long-term view, rather than as isolated tasks.</p>
                    <p>My attempt, through Money Maze, is to make these conversations and processes feel more structured, more understandable and easier to navigate over time.</p>
                </div>
            </div>
        </section>

        <section class="about-grid-card about-matters-card">
            <div class="card-split">
                <div class="card-content-wrap">
                    <h3>What matters to me</h3>
                    <p>One of the things I value most about this profession is the opportunity to be part of meaningful financial journeys — whether that involves putting structure around finances, handling important compliance work, or simply being a steady point of contact in an area that often feels overwhelming.</p>
                    <p>To me, good financial work is not just about products or paperwork. It is also about trust, consistency, responsibility and bringing order to something that affects such an important part of people's lives.</p>
                </div>
                <div class="card-side-image">
                    <img src="{{ asset('assets/crops/about-compass.jpg') }}" alt="Brass compass on map book">
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Banner: Looking to connect? -->
    <x-cta-banner 
        title="Looking to connect?" 
        copy="If you’d like to know more about my work, services or areas of focus, feel free to get in touch." 
        primary="VIEW SERVICES" 
        primary-route="services" 
        secondary="CONTACT ME" 
        secondary-route="contact" 
        variant="golden" 
    />
</div>
@endsection

