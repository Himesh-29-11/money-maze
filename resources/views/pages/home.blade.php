@extends('layouts.app')

@section('title', 'Mitali Mehta — Personal Finance Professional')

@section('content')
<!-- Hero Section -->
<section class="hero hero-home">
    <div class="container hero-grid">
        <div class="hero-content">
            <p class="eyebrow">CLARITY. STRUCTURE. CONFIDENCE.</p>
            <h1>Navigate Life’s Financial Decisions with Confidence.</h1>
            <h2 class="hero-byline">Mitali Mehta, CA, CFP®</h2>
            <p class="hero-lead">Chartered Accountant and Personal Finance Professional helping individuals, professionals and NRIs navigate taxation, investments and financial decisions with clarity, structure and a long-term perspective.</p>
            <div class="hero-actions">
                <a href="{{ route('contact') }}" class="button button-primary">Let's Connect <span class="arrow-icon">→</span></a>
                <a href="{{ route('services') }}" class="button button-outline">Explore Services</a>
            </div>
            <div class="hero-regulatory-note">
                <span class="shield-icon">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 11l2 2 4-4"/>
                    </svg>
                </span>
                <p>Mutual fund distribution services are offered as a SEBI-registered Mutual Fund Distributor. Other financial products and professional services are offered through the practice as applicable.</p>
            </div>
        </div>
        <div class="hero-portrait-wrap">
            <img class="hero-portrait" src="{{ asset('assets/mitali-profile.png') }}" alt="Mitali Mehta, Personal Finance Professional">
            <div class="floating-quote-frame">
                <p>Good financial decisions today create freedom tomorrow.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Pillar Section -->
<section class="container service-pillars section-pad-top">
    <div class="card-grid card-grid-3">
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="20" x2="18" y2="10"/>
                    <line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6" y1="20" x2="6" y2="14"/>
                </svg>
            </div>
            <h3>1. INVESTMENT SOLUTIONS</h3>
            <p>Access to a range of investment solutions including mutual funds, fixed deposits, bonds, NCDs, GIFT City products and select opportunities, depending on client requirements and suitability.</p>
            <a class="text-link" href="{{ route('services') }}">Learn More <span class="arrow-icon">→</span></a>
        </article>
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="4" y="4" width="16" height="16" rx="2"/>
                    <line x1="9" y1="9" x2="15" y2="9"/>
                    <line x1="9" y1="13" x2="15" y2="13"/>
                    <line x1="9" y1="17" x2="15" y2="17"/>
                </svg>
            </div>
            <h3>2. TAX PLANNING & COMPLIANCE</h3>
            <p>Support with income tax returns, tax planning, GST registrations and GST return filings to keep your financial affairs organised, compliant and tax-efficient.</p>
            <a class="text-link" href="{{ route('services') }}">Learn More <span class="arrow-icon">→</span></a>
        </article>
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <h3>3. FINANCIAL ORGANISATION & PROFESSIONAL SUPPORT</h3>
            <p>Practical support for salaried individuals and self-employed professionals across financial records, cash flow review, tax-ready documentation and better financial clarity.</p>
            <a class="text-link" href="{{ route('services') }}">Learn More <span class="arrow-icon">→</span></a>
        </article>
    </div>
</section>

<!-- Why Work With Me Section -->
<section class="why-section section-pad">
    <div class="container">
        <div class="section-title-divider">
            <span class="divider-line"></span>
            <h2>WHY WORK WITH ME?</h2>
            <span class="divider-line"></span>
        </div>
        <div class="value-grid">
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </div>
                <h3>Holistic Perspective</h3>
                <p>I look at the bigger picture — your goals, priorities and financial well-being.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <h3>Structured & Personalised</h3>
                <p>Every strategy is tailored to your unique financial situation and life goals.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M9 21h6M12 17v4M12 3a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17h8v-1.26c1.81-1.27 3-3.36 3-5.74a7 7 0 0 0-7-7z"/>
                    </svg>
                </div>
                <h3>Clarity Over Complexity</h3>
                <p>I simplify complex financial matters so you can make informed decisions.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M17 11h1a3 3 0 0 1 0 6h-1m-10 0a3 3 0 0 1 0-6h1M9 17h6M9 13h6"/>
                        <path d="M16 17a4 4 0 0 1-8 0v-2h8v2z"/>
                    </svg>
                </div>
                <h3>Long-term Relationships</h3>
                <p>Built on trust, transparency and a commitment to your financial journey.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 11l2 2 4-4"/>
                    </svg>
                </div>
                <h3>Ethics & Professionalism</h3>
                <p>Guided by strong values, regulatory compliance and client-first approach.</p>
            </div>
        </div>
    </div>
</section>

<!-- Credentials Section -->
<section class="container credentials-section section-pad-sm">
    <div class="credentials-box">
        <h3 class="credentials-title">PROFESSIONAL CREDENTIALS</h3>
        <div class="credential-flex-row">
            <div class="credential-badge-item">
                <span class="badge-round">CA</span>
                <span class="badge-label">Chartered Accountant</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">CFP</span>
                <span class="badge-label">Certified Financial Planner</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">QPFP</span>
                <span class="badge-label">Qualified Personal Finance Professional</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">LLB</span>
                <span class="badge-label">Bachelor of Laws</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">SEBI</span>
                <span class="badge-label">SEBI-registered Mutual Fund Distributor</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">NRI</span>
                <span class="badge-label">NRI Investment Course Certification</span>
            </div>
        </div>
    </div>
</section>

<!-- Triple Grid Section -->
<section class="container triple-feature section-pad">
    <!-- Insights & Articles -->
    <article class="mini-feature">
        <p class="eyebrow">INSIGHTS & ARTICLES</p>
        <p class="mini-desc">Thoughtful articles and practical insights on personal finance, taxation and investments.</p>
        <div class="insights-row-images">
            <img src="{{ asset('assets/crops/insights-1.jpg') }}" alt="Desk writing">
            <img src="{{ asset('assets/crops/insights-2.jpg') }}" alt="Newspaper">
            <img src="{{ asset('assets/crops/insights-3.jpg') }}" alt="Laptop and coffee">
        </div>
        <a class="text-link" href="{{ route('insights') }}">Explore Insights <span class="arrow-icon">→</span></a>
    </article>

    <!-- Featured In -->
    <article class="mini-feature">
        <p class="eyebrow">FEATURED IN</p>
        <p class="mini-desc">Seen in leading publications and platforms.</p>
        <div class="logos-badge-grid">
            <div class="logo-box box-zee">
                <span class="zee-orange">ZEE</span><span class="zee-blue">BUSINESS</span>
            </div>
            <div class="logo-box box-zee-24">
                <span class="zee-blue">ZEE</span> <span class="zee-red">24 KALAK</span>
            </div>
            <div class="logo-box box-fe">
                <span class="fe-red">♦</span> <span class="fe-text">FINANCIAL EXPRESS</span>
            </div>
            <div class="logo-box box-chitra">
                <span class="chitra-text">ચિત્રલેખા</span>
            </div>
        </div>
        <a class="text-link" href="{{ route('media') }}">View All Features <span class="arrow-icon">→</span></a>
    </article>

    <!-- What Clients Say -->
    <article class="mini-feature">
        <p class="eyebrow">WHAT CLIENTS SAY</p>
        <div class="stars-rating">★★★★★</div>
        <div class="client-quote-block">
            <p class="quote-text">“Mitali explains complex financial concepts so simply. Her guidance has helped me make confident and well-informed decisions.”</p>
            <p class="quote-author">— Rajiv S., Business Owner</p>
        </div>
        <div class="client-quote-block">
            <p class="quote-text">“Professional, approachable and extremely knowledgeable. I truly value her holistic approach to my finances.”</p>
            <p class="quote-author">— Priya M., HR Professional</p>
        </div>
        <a class="text-link" href="{{ route('testimonials') }}">Read All Testimonials <span class="arrow-icon">→</span></a>
    </article>
</section>

<!-- Let's Start a Conversation Section -->
<section class="container conversation-section">
    <div class="conversation-banner-card">
        <div class="banner-decor-left"></div>
        <div class="banner-content">
            <h2>Let’s Start a Conversation</h2>
            <p>Whether you need support with investments, taxation, financial organisation or simply want greater clarity around your finances, I would be happy to connect.</p>
            <a href="{{ route('contact') }}" class="button button-primary banner-cta-btn">Let's Connect <span class="arrow-icon">→</span></a>
        </div>
        <div class="banner-decor-right"></div>
    </div>
</section>
@endsection
