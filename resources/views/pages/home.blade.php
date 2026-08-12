@extends('layouts.app')

@section('title', 'Mitali Mehta — Personal Finance Professional')

@section('content')
<!-- Hero Section -->
<section class="hero hero-home">
    <div class="hero-grid">
        <div class="hero-content">
            <p class="eyebrow">CLARITY. STRUCTURE. CONFIDENCE.</p>
            <h1>Navigate Life’s Financial Decisions with Confidence.</h1>
            <div class="gold-rule"></div>
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
        <div class="hero-photo">
            <img src="{{ asset('assets/crops/home-hero.jpg') }}" alt="Mitali Mehta at her desk — good financial decisions today create freedom tomorrow">
        </div>
    </div>
</section>

<!-- Services Pillar Section -->
<section class="container service-pillars section-pad-top">
    <div class="card-grid card-grid-3">
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">
                <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 20h16"/>
                    <path d="M7 20v-5"/>
                    <path d="M12 20v-8"/>
                    <path d="M17 20v-3"/>
                    <path d="M6 10l4.5-4.5 3 3L19 3"/>
                    <path d="M15.5 3H19v3.5"/>
                </svg>
            </div>
            <h3>1. INVESTMENT SOLUTIONS</h3>
            <p>Access to a range of investment solutions including mutual funds, fixed deposits, bonds, NCDs, GIFT City products and select opportunities, depending on client requirements and suitability.</p>
            <a class="text-link" href="{{ route('services') }}">Learn More <span class="arrow-icon">→</span></a>
        </article>
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">
                <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 3H6a1.5 1.5 0 0 0-1.5 1.5v15A1.5 1.5 0 0 0 6 21h6"/>
                    <path d="M14 3v5h-5"/>
                    <path d="M8 12h3"/>
                    <path d="M8 15.5h3"/>
                    <rect x="13.5" y="11" width="7" height="10" rx="1"/>
                    <path d="M15.5 13.5h3"/>
                    <path d="M15.5 16h1"/>
                    <path d="M18.5 16h-0.01"/>
                    <path d="M15.5 18.5h1"/>
                    <path d="M18.5 18.5h-0.01"/>
                </svg>
            </div>
            <h3>2. TAX PLANNING & COMPLIANCE</h3>
            <p>Support with income tax returns, tax planning, GST registrations and GST return filings to keep your financial affairs organised, compliant and tax-efficient.</p>
            <a class="text-link" href="{{ route('services') }}">Learn More <span class="arrow-icon">→</span></a>
        </article>
        <article class="feature-card feature-card-tall">
            <div class="icon-disc icon-green">
                <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="3.4"/>
                    <path d="M5.5 19.5c.8-3.4 3.3-5.2 6.5-5.2s5.7 1.8 6.5 5.2"/>
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
                    <svg viewBox="0 0 24 24" width="42" height="42" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="5" r="2.6"/>
                        <path d="M8.4 11.2c.6-2 1.9-3 3.6-3s3 1 3.6 3"/>
                        <path transform="translate(6.3,17.4)" d="M0 -2.6l.8 1.6 1.8.3-1.3 1.3.3 1.8-1.6-.9-1.6.9.3-1.8-1.3-1.3 1.8-.3z"/>
                        <path transform="translate(12,19.4)" d="M0 -2.6l.8 1.6 1.8.3-1.3 1.3.3 1.8-1.6-.9-1.6.9.3-1.8-1.3-1.3 1.8-.3z"/>
                        <path transform="translate(17.7,17.4)" d="M0 -2.6l.8 1.6 1.8.3-1.3 1.3.3 1.8-1.6-.9-1.6.9.3-1.8-1.3-1.3 1.8-.3z"/>
                    </svg>
                </div>
                <h3>Holistic Perspective</h3>
                <p>I look at the bigger picture — your goals, priorities and financial well-being.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="42" height="42" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="6" y="4.5" width="12" height="17" rx="1.5"/>
                        <path d="M9.5 4.5V3h5v1.5"/>
                        <path d="M9 10l1.2 1.2 2.1-2.3"/>
                        <path d="M9 15l1.2 1.2 2.1-2.3"/>
                        <path d="M14.6 10.4h1.4"/>
                        <path d="M14.6 15.4h1.4"/>
                    </svg>
                </div>
                <h3>Structured & Personalised</h3>
                <p>Every strategy is tailored to your unique financial situation and life goals.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="42" height="42" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3.5a5.8 5.8 0 0 1 5.8 5.8c0 1.9-.9 3.3-2.1 4.5-.6.6-.9 1.4-.9 2.2h-5.6c0-.8-.3-1.6-.9-2.2-1.2-1.2-2.1-2.6-2.1-4.5A5.8 5.8 0 0 1 12 3.5z"/>
                        <path d="M10 18.8h4"/>
                        <path d="M10.6 21.2h2.8"/>
                        <path d="M3.5 9.3H2"/>
                        <path d="M22 9.3h-1.5"/>
                        <path d="M5.2 3.9l1.1 1.1"/>
                        <path d="M18.8 3.9l-1.1 1.1"/>
                    </svg>
                </div>
                <h3>Clarity Over Complexity</h3>
                <p>I simplify complex financial matters so you can make informed decisions.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="42" height="42" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2.5 10.5L7 6l3.5 2.5L14 5l4.5 4.5"/>
                        <path d="M7 6L3.5 9.5 6 12"/>
                        <path d="M18.5 6l3 3.5L19 12"/>
                        <path d="M6 12l3.5 3.5a1.5 1.5 0 0 0 2.1-2.1"/>
                        <path d="M11.6 13.4l2.4 2.4a1.5 1.5 0 0 0 2.1-2.1l-2.6-2.7"/>
                        <path d="M19 12l-2.9 2.9a1.5 1.5 0 0 1-2.1-2.1"/>
                    </svg>
                </div>
                <h3>Long-term Relationships</h3>
                <p>Built on trust, transparency and a commitment to your financial journey.</p>
            </div>
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="42" height="42" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 21.5s7.5-3.7 7.5-9.3V5.5L12 2.7 4.5 5.5v6.7c0 5.6 7.5 9.3 7.5 9.3z"/>
                        <path d="M9 11l2.2 2.2L15.5 9"/>
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
                <span class="badge-round">CA<sup>®</sup></span>
                <span class="badge-label">Chartered<br>Accountant</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">CFP<sup>®</sup></span>
                <span class="badge-label">Certified Financial<br>Planner</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">QPFP</span>
                <span class="badge-label">Qualified Personal<br>Finance Professional</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">LLB</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-square">SE
BI</span>
                <span class="badge-label">SEBI-registered<br>Mutual Fund<br>Distributor</span>
            </div>
            <div class="credential-badge-item">
                <span class="badge-round">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.4">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M3 12h18"/>
                        <path d="M12 3a13.8 13.8 0 0 1 0 18 13.8 13.8 0 0 1 0-18z"/>
                    </svg>
                </span>
                <span class="badge-label">NRI Investment Course<br>Certification</span>
            </div>
        </div>
    </div>
</section>

<!-- Triple Grid Section -->
<section class="container triple-feature section-pad">
    <!-- Insights & Articles -->
    <article class="mini-feature">
        <h3 class="mini-feature-title">INSIGHTS & ARTICLES</h3>
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
        <h3 class="mini-feature-title">FEATURED IN</h3>
        <p class="mini-desc">Seen in leading publications and platforms.</p>
        <div class="logos-badge-grid">
            <div class="logo-box">
                <span class="zee-circle">ZEE</span><span class="logo-business">BUSINESS</span>
            </div>
            <div class="logo-box">
                <span class="zee-circle zee-circle-blue">ZEE</span><span class="logo-kalak">24 KALAK</span>
            </div>
            <div class="logo-box">
                <span class="fe-diamond">♦</span><span class="fe-name">FINANCIAL EXPRESS</span>
            </div>
            <div class="logo-box">
                <span class="chitra-text">ચિત્રલેખા</span>
            </div>
        </div>
        <a class="text-link" href="{{ route('media') }}">View All Features <span class="arrow-icon">→</span></a>
    </article>

    <!-- What Clients Say -->
    <article class="mini-feature">
        <h3 class="mini-feature-title">WHAT CLIENTS SAY</h3>
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
<section class="conversation-section">
    <div class="conversation-banner-card">
        <div class="banner-content">
            <h2>Let’s Start a Conversation</h2>
            <p>Whether you need support with investments, taxation, financial organisation or simply want greater clarity around your finances, I would be happy to connect.</p>
            <a href="{{ route('contact') }}" class="button button-primary banner-cta-btn">Let's Connect <span class="arrow-icon">→</span></a>
        </div>
    </div>
</section>
@endsection
