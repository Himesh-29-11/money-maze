@extends('layouts.app')

@section('title', 'Media & Features — Money Maze')

@section('content')
<div class="media-page-v2">
    <!-- Hero Section: Split Column -->
    <section class="media-hero-section">
        <div class="container hero-grid-v2">
            <div class="hero-text-col">
                <p class="eyebrow">MEDIA &amp; FEATURES</p>
                <h1>Television interviews, video series, <span>podcasts</span> and <span>media appearances</span>.</h1>
                <div class="hero-body-text">
                    <p>This section brings together my television interviews, educational video content, podcasts and selected media features across personal finance, retirement planning, taxation, investing and related financial topics. It is a space for conversations, appearances and educational formats that go beyond written articles.</p>
                </div>
            </div>
            <div class="hero-image-col">
                <img src="{{ asset('assets/crops/media-hero.jpg') }}" alt="Media interview microphone and setup">
            </div>
        </div>
    </section>

    <!-- Section 1: Television Interviews -->
    <section class="media-section container">
        <div class="media-section-header">
            <div class="section-title-wrap">
                <h2 class="section-num-title">1. TELEVISION INTERVIEWS</h2>
                <p class="section-desc">Practical financial conversations designed for a wider audience — translating everyday money concerns into clear, actionable discussions.</p>
            </div>
            <a href="#" class="view-all-link">View All Interviews <span>→</span></a>
        </div>
        <div class="tv-interviews-grid">
            <!-- Card 1 -->
            <article class="tv-interview-card">
                <div class="tv-thumb-side">
                    <img src="{{ asset('assets/crops/media-1.jpg') }}" alt="Pocket Money interview screenshot">
                    <span class="play-btn-overlay">▶</span>
                </div>
                <div class="tv-info-side">
                    <span class="tv-badge">POCKET MONEY</span>
                    <h3>Children &amp; Money Habits: Building a Strong Foundation</h3>
                    <p class="tv-channel">News Capital TV <span>·</span> Topic: Children &amp; Money</p>
                    <p class="tv-desc">A conversation on pocket money, financial habits, budget planning for children and building money confidence early.</p>
                    <a href="#" class="watch-btn">Watch Interview <span>→</span></a>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="tv-interview-card">
                <div class="tv-thumb-side">
                    <img src="{{ asset('assets/crops/media-2.jpg') }}" alt="Retire Rich interview screenshot">
                    <span class="play-btn-overlay">▶</span>
                </div>
                <div class="tv-info-side">
                    <span class="tv-badge">RETIRE RICH</span>
                    <h3>Retirement Planning: Plan Today, Retire Rich</h3>
                    <p class="tv-channel">News Capital TV <span>·</span> Topic: Retirement Planning</p>
                    <p class="tv-desc">Discussion on retirement readiness, income planning, corpus creation and living a financially free life.</p>
                    <a href="#" class="watch-btn">Watch Interview <span>→</span></a>
                </div>
            </article>
        </div>
    </section>

    <!-- Section 2: Video Series & Short Explainers -->
    <section class="media-section container">
        <div class="media-section-header">
            <div class="section-title-wrap">
                <h2 class="section-num-title">2. VIDEO SERIES &amp; SHORT EXPLAINERS</h2>
                <p class="section-desc">Short-form financial content that breaks down timely topics and investor questions into simple, actionable insights.</p>
            </div>
            <a href="#" class="view-all-link">View All Videos <span>→</span></a>
        </div>
        <div class="video-series-row">
            <!-- Video 1 -->
            <article class="video-series-card">
                <div class="video-thumb-wrap">
                    <img src="{{ asset('assets/crops/services-1.jpg') }}" alt="What is an IPO thumbnail">
                    <span class="duration-badge">02:40</span>
                </div>
                <h3>What is an IPO? Key Basics Explained</h3>
                <p class="video-source">Chitralekha - IPO Series</p>
                <a href="#" class="video-action-link">Watch Video <span>→</span></a>
            </article>

            <!-- Video 2 -->
            <article class="video-series-card">
                <div class="video-thumb-wrap">
                    <img src="{{ asset('assets/crops/services-2.jpg') }}" alt="SME IPO thumbnail">
                    <span class="duration-badge">03:20</span>
                </div>
                <h3>SME IPO: What Should Investors Know?</h3>
                <p class="video-source">Chitralekha - IPO Series</p>
                <a href="#" class="video-action-link">Watch Video <span>→</span></a>
            </article>

            <!-- Video 3 -->
            <article class="video-series-card">
                <div class="video-thumb-wrap">
                    <img src="{{ asset('assets/crops/services-3.jpg') }}" alt="Long Term Investing thumbnail">
                    <span class="duration-badge">03:00</span>
                </div>
                <h3>Why Long-Term Investing Always Wins</h3>
                <p class="video-source">Because Money Matters</p>
                <a href="#" class="video-action-link">Watch Video <span>→</span></a>
            </article>

            <!-- Video 4 -->
            <article class="video-series-card">
                <div class="video-thumb-wrap">
                    <img src="{{ asset('assets/crops/services-4.jpg') }}" alt="Emergency Fund thumbnail">
                    <span class="duration-badge">02:50</span>
                </div>
                <h3>Emergency Fund: How Much is Enough?</h3>
                <p class="video-source">Because Money Matters</p>
                <a href="#" class="video-action-link">Watch Video <span>→</span></a>
            </article>

            <!-- Video 5 -->
            <article class="video-series-card">
                <div class="video-thumb-wrap">
                    <img src="{{ asset('assets/crops/services-hero.jpg') }}" alt="Upcoming IPOs thumbnail">
                    <span class="duration-badge">03:10</span>
                </div>
                <h3>Upcoming IPOs: What to Watch For</h3>
                <p class="video-source">Chitralekha - IPO Series</p>
                <a href="#" class="video-action-link">Watch Video <span>→</span></a>
            </article>
        </div>
    </section>

    <!-- Section 3: Podcasts & Recorded Conversations -->
    <section class="media-section container">
        <div class="media-section-header">
            <div class="section-title-wrap">
                <h2 class="section-num-title">3. PODCASTS &amp; RECORDED CONVERSATIONS</h2>
                <p class="section-desc">In-depth conversations and interviews on financial planning, taxation, investing and money themes.</p>
            </div>
            <a href="#" class="view-all-link">View All Podcasts <span>→</span></a>
        </div>
        <div class="podcasts-grid">
            <!-- Podcast 1 -->
            <article class="podcast-card-v2">
                <div class="podcast-card-header">
                    <span class="podcast-tag">RETIREMENT PLANNING</span>
                    <span class="podcast-duration">26:10</span>
                </div>
                <h3>Retirement Planning in Your 40s</h3>
                <p class="podcast-desc">Key steps to take in your 40s to build a secure retirement and financial independence.</p>
                <a href="#" class="podcast-action">Listen / Watch <span>→</span></a>
            </article>

            <!-- Podcast 2 -->
            <article class="podcast-card-v2">
                <div class="podcast-card-header">
                    <span class="podcast-tag">TAX PLANNING</span>
                    <span class="podcast-duration">32:40</span>
                </div>
                <h3>Tax Planning for Salaried Individuals</h3>
                <p class="podcast-desc">Smart tax-planning strategies to save more, invest better and stay compliant.</p>
                <a href="#" class="podcast-action">Listen / Watch <span>→</span></a>
            </article>

            <!-- Podcast 3 -->
            <article class="podcast-card-v2">
                <div class="podcast-card-header">
                    <span class="podcast-tag">INVESTING</span>
                    <span class="podcast-duration">28:15</span>
                </div>
                <h3>Mutual Funds vs Direct Equity</h3>
                <p class="podcast-desc">Understanding the right approach for your goals, risk appetite and timeline.</p>
                <a href="#" class="podcast-action">Listen / Watch <span>→</span></a>
            </article>
        </div>
    </section>

    <!-- Section 4: Featured In -->
    <section class="media-section container featured-in-logos-section">
        <h2 class="section-num-title">4. FEATURED IN</h2>
        <p class="section-desc">Platforms and publications where my work, interviews and financial perspectives have appeared.</p>
        <div class="media-logos-row">
            <div class="media-logo-card"><strong>NEWS CAPITAL TV</strong><small>Television Interviews</small></div>
            <div class="media-logo-card"><strong>મુંબઈ સમાચાર</strong><small>Articles &amp; Columns</small></div>
            <div class="media-logo-card"><strong>CAPITAL WORLD</strong><small>Magazine Articles</small></div>
            <div class="media-logo-card"><strong>BUSINESS GUARDIAN</strong><small>Articles &amp; Contributions</small></div>
            <div class="media-logo-card"><strong>ચિત્રલેખા</strong><small>Video Series &amp; IPOs</small></div>
            <div class="media-logo-card"><strong>PRINT MEDIA</strong><small>Interviews &amp; Features</small></div>
        </div>
    </section>

    <!-- Bottom Dark Banner -->
    <section class="media-footer-banner container">
        <div class="cta-split-v3">
            <div class="cta-message-text">
                <h3>Explore the conversations behind the work.</h3>
                <p>From articles and interviews to short educational video content, each format offers a practical way to engage with personal finance themes.</p>
            </div>
            <div class="cta-actions-v3">
                <a href="{{ route('insights') }}" class="button button-primary">READ MY ARTICLES</a>
                <a href="#" class="button button-primary button-darker">WATCH &amp; LISTEN</a>
                <a href="{{ route('contact') }}" class="button button-outline-white">GET IN TOUCH</a>
            </div>
        </div>
    </section>
</div>
@endsection
