@extends('layouts.app')

@section('title', 'Money Maze — Clarity today. Freedom tomorrow.')

@section('content')
<section class="hero hero-home">
    <div class="container hero-grid">
        <div class="hero-content">
            <p class="eyebrow">Clarity. Structure. Confidence.</p>
            <h1>Navigate Life’s Financial Decisions with Confidence.</h1>
            <div class="gold-rule"></div>
            <h2 class="hero-byline">Mitali Mehta, CA, CFP®</h2>
            <p class="hero-lead">Chartered Accountant and Personal Finance Professional helping individuals, professionals and NRIs navigate taxation, investments and financial decisions with clarity, structure and a long-term perspective.</p>
            <div class="hero-actions">
                <a href="{{ route('contact') }}" class="button button-primary">Let's Connect <span aria-hidden="true">→</span></a>
                <a href="{{ route('services') }}" class="button button-outline">Explore Services</a>
            </div>
            <x-regulatory-note :text="$regulatoryNote" />
        </div>
        <div class="hero-portrait-wrap">
            <div class="portrait-accent portrait-accent-one"></div>
            <div class="portrait-accent portrait-accent-two"></div>
            <img class="hero-portrait" src="{{ asset('assets/mitali-profile.png') }}" alt="Mitali Mehta, personal finance professional">
            <div class="hero-quote">Good financial<br>decisions today<br><em>create freedom<br>tomorrow.</em></div>
        </div>
    </div>
</section>

<section class="container service-pillars section-pad-top">
    <x-section-heading eyebrow="A connected view of your finances" title="What I do" copy="Investment execution, taxation and financial organisation — brought together so the moving pieces are easier to understand and act on." />
    <div class="card-grid card-grid-3">
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">↗</div>
            <p class="card-number">01</p>
            <h3>Investment Solutions</h3>
            <p>Access to a range of investment solutions including mutual funds, fixed deposits, bonds, NCDs, GIFT City products and other relevant avenues.</p>
            <a class="text-link" href="{{ route('services') }}">Learn more <span>→</span></a>
        </article>
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-gold">▤</div>
            <p class="card-number">02</p>
            <h3>Tax Planning &amp; Compliance</h3>
            <p>Support with income tax returns, tax planning, GST registrations and GST return filings to keep your financial affairs organised and compliant.</p>
            <a class="text-link" href="{{ route('services') }}">Learn more <span>→</span></a>
        </article>
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-blue">◯</div>
            <p class="card-number">03</p>
            <h3>Financial Organisation &amp; Professional Support</h3>
            <p>Practical support for salaried individuals and self-employed professionals across records, cash-flow review, tax-ready documents and financial clarity.</p>
            <a class="text-link" href="{{ route('services') }}">Learn more <span>→</span></a>
        </article>
    </div>
</section>

<section class="why-section section-pad">
    <div class="container">
        <x-section-heading eyebrow="The Money Maze approach" title="Why work with me?" copy="Financial matters rarely exist in isolation. My work is grounded in clarity, structure and a long-term perspective." />
        <div class="value-grid">
            <div class="value-item"><span class="line-icon">✧</span><h3>Holistic perspective</h3><p>Look at the bigger picture — your goals, priorities and financial well-being.</p></div>
            <div class="value-item"><span class="line-icon">☷</span><h3>Structured &amp; personalised</h3><p>Organise information and decisions around your actual financial situation.</p></div>
            <div class="value-item"><span class="line-icon">◇</span><h3>Clarity over complexity</h3><p>Make important financial ideas easier to understand and apply.</p></div>
            <div class="value-item"><span class="line-icon">♢</span><h3>Long-term relationships</h3><p>Build trust through dependable support and continuity over time.</p></div>
            <div class="value-item"><span class="line-icon">✓</span><h3>Ethics &amp; professionalism</h3><p>Work with care, transparency and respect for regulatory requirements.</p></div>
        </div>
    </div>
</section>

<section class="container credentials-strip">
    <p class="strip-title">Professional credentials</p>
    <div class="credential-list">
        <span><b>CA</b> Chartered<br>Accountant</span>
        <span><b>CFP®</b> Certified Financial<br>Planner</span>
        <span><b>QFPP</b> Qualified Personal<br>Finance Professional</span>
        <span><b>LLB</b> Bachelor of<br>Laws</span>
        <span><b>SEBI</b> Registered Mutual<br>Fund Distributor</span>
        <span><b>NRI</b> Investment Course<br>Certification</span>
    </div>
</section>

<section class="container triple-feature section-pad">
    <!-- Insights & Articles -->
    <article class="mini-feature mini-feature-insights">
        <p class="eyebrow">INSIGHTS & ARTICLES</p>
        <h3>Thoughtful articles and practical insights on personal finance, taxation and investments.</h3>
        <div class="insights-thumbnail-grid">
            <img src="{{ asset('assets/crops/insights-1.jpg') }}" alt="Writing/desk">
            <img src="{{ asset('assets/crops/insights-2.jpg') }}" alt="Newspaper">
            <img src="{{ asset('assets/crops/insights-3.jpg') }}" alt="Coffee cup">
        </div>
        <a class="text-link" href="{{ route('insights') }}">Explore Insights <span>→</span></a>
    </article>

    <!-- Featured In -->
    <article class="mini-feature mini-feature-featured-in">
        <p class="eyebrow">FEATURED IN</p>
        <h3>Semi-revealing publications and platforms.</h3>
        <div class="featured-logos-grid">
            <div class="logo-badge logo-business"><span>208 BUSINESS</span></div>
            <div class="logo-badge logo-kalan"><span>ZERO 24 KALAN</span></div>
            <div class="logo-badge logo-express"><span>FINANCIAL EXPRESS</span></div>
            <div class="logo-badge logo-gujarati"><span>ચિત્રલેખા</span></div>
        </div>
        <a class="text-link" href="{{ route('media') }}">View All Features <span>→</span></a>
    </article>

    <!-- What Clients Say -->
    <article class="mini-feature mini-feature-testimonials">
        <p class="eyebrow">WHAT CLIENTS SAY</p>
        <div class="stars" aria-label="Five stars">★★★★★</div>
        <div class="testimonial-quotes-wrap">
            <blockquote>
                “Mitali explains complex financial concepts so simply. Her guidance has helped me make confident and well-informed decisions.”
                <cite>— Rajiv S., Business Owner</cite>
            </blockquote>
            <blockquote>
                “Professional, approachable and extremely knowledgeable. I truly value her holistic approach to my finances.”
                <cite>— Priya M., HR Professional</cite>
            </blockquote>
        </div>
        <a class="text-link" href="{{ route('testimonials') }}">Read All Testimonials <span>→</span></a>
    </article>
</section>

<x-cta-banner title="Let’s Start a Conversation" copy="Whether you need support with investments, taxation, financial organisation or simply want greater clarity around your finances, I would be happy to connect." primary="Let's Connect" secondary="Read Insights" secondary-route="insights" variant="light" />
@endsection
