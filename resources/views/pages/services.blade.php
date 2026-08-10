@extends('layouts.app')

@section('title', 'Services — Money Maze')

@section('content')
<div class="services-page-v2">
    <!-- Hero Section: Split Column (Text Left, Image Right) -->
    <section class="services-hero-section">
        <div class="container hero-grid-v2">
            <div class="hero-text-col">
                <p class="eyebrow">SERVICES</p>
                <h1>A practical approach to investments, <span>taxation</span> and <span>financial organisation</span>.</h1>
                <div class="hero-body-text">
                    <p>At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.</p>
                    <p>The aim is to make important financial matters easier to manage — whether that involves investing, tax filings, GST-related work, or keeping financial records and information in better order.</p>
                </div>
            </div>
            <div class="hero-image-col">
                <img src="{{ asset('assets/crops/services-hero.jpg') }}" alt="Money Maze services concept">
            </div>
        </div>
    </section>

    <!-- 3 Service Pillars Section -->
    <section class="services-pillars-section container">
        <div class="pillars-grid-v2">
            <!-- Pillar 01 -->
            <article class="pillar-card-v2">
                <div class="pillar-header-v2">
                    <div class="pillar-num-icon">
                        <span class="icon-circle icon-green">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 6l-9.5 9.5-5-5L1 18"/>
                                <path d="M17 6h6v6"/>
                            </svg>
                        </span>
                        <span class="pillar-number">01</span>
                    </div>
                    <h2>Investment Solutions</h2>
                </div>
                <div class="pillar-body-v2">
                    <p class="pillar-desc">Access to a range of investment avenues across mutual funds and other financial products, based on individual requirements and preferences.</p>
                    <div class="pillar-bullets-wrap">
                        <h4>This may include:</h4>
                        <ul>
                            <li>Mutual Funds</li>
                            <li>Fixed Deposits (FDs)</li>
                            <li>Bonds</li>
                            <li>Non-Convertible Debentures (NCDs)</li>
                            <li>GIFT City products</li>
                            <li>Other relevant investment avenues, where applicable</li>
                        </ul>
                    </div>
                </div>
                <div class="pillar-footer-image">
                    <img src="{{ asset('assets/crops/services-1.jpg') }}" alt="Gold coins on desk">
                </div>
            </article>

            <!-- Pillar 02 -->
            <article class="pillar-card-v2">
                <div class="pillar-header-v2">
                    <div class="pillar-num-icon">
                        <span class="icon-circle icon-gold">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <path d="M14 2v6h6"/>
                                <path d="M16 13H8"/>
                                <path d="M16 17H8"/>
                                <path d="M10 9H8"/>
                            </svg>
                        </span>
                        <span class="pillar-number">02</span>
                    </div>
                    <h2>Taxation &amp; Compliance</h2>
                </div>
                <div class="pillar-body-v2">
                    <p class="pillar-desc">Practical support with tax-related responsibilities and compliance requirements, with a focus on keeping the process smooth, timely and easier to manage.</p>
                    <div class="pillar-bullets-wrap">
                        <h4>Tax includes:</h4>
                        <ul>
                            <li>Tax Planning</li>
                            <li>Income Tax Return Filing</li>
                            <li>GST Registration</li>
                            <li>GST Return Filing &amp; Support</li>
                        </ul>
                    </div>
                </div>
                <div class="pillar-footer-image">
                    <img src="{{ asset('assets/crops/services-2.jpg') }}" alt="Tax documents and calculator">
                </div>
            </article>

            <!-- Pillar 03 -->
            <article class="pillar-card-v2">
                <div class="pillar-header-v2">
                    <div class="pillar-num-icon">
                        <span class="icon-circle icon-blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                        </span>
                        <span class="pillar-number">03</span>
                    </div>
                    <h2>Financial Organisation &amp; Professional Support</h2>
                </div>
                <div class="pillar-body-v2">
                    <p class="pillar-desc">Support with financial records, account-related information and key financial data so that filings, reporting and ongoing financial matters are handled with greater ease and continuity.</p>
                    <div class="pillar-bullets-wrap">
                        <h4>This may include:</h4>
                        <ul>
                            <li>Maintaining financial records / accounts</li>
                            <li>Preparing financial data for ITR / GST filings</li>
                            <li>Organising financial information before return filing</li>
                            <li>Basic profit &amp; loss and cash-flow review</li>
                            <li>Helping professionals understand available surplus for investing or future planning</li>
                        </ul>
                    </div>
                </div>
                <div class="pillar-footer-image">
                    <img src="{{ asset('assets/crops/services-3.jpg') }}" alt="Notebook, pen, and plant">
                </div>
            </article>
        </div>
    </section>

    <!-- How I Work Section -->
    <section class="services-process-section">
        <div class="container">
            <h2 class="section-title-v2">How I Work</h2>
            <div class="process-steps-grid-v2">
                <!-- Step 01 -->
                <div class="step-card-v2">
                    <div class="step-badge-wrap">
                        <span class="step-badge-num">01</span>
                    </div>
                    <h3>Understand the requirement</h3>
                    <p>The process begins with understanding the nature of the requirement, the client's current financial position, and the areas where assistance is needed.</p>
                </div>
                <!-- Step 02 -->
                <div class="step-card-v2">
                    <div class="step-badge-wrap">
                        <span class="step-badge-num">02</span>
                    </div>
                    <h3>Review the relevant information</h3>
                    <p>Where required, I review the available financial information, records, filings or documentation to understand what needs attention and what the next steps should be.</p>
                </div>
                <!-- Step 03 -->
                <div class="step-card-v2">
                    <div class="step-badge-wrap">
                        <span class="step-badge-num">03</span>
                    </div>
                    <h3>Organise the moving parts</h3>
                    <p>The next step is to bring together the relevant details, documents and financial information so that the process becomes easier to manage and execute.</p>
                </div>
                <!-- Step 04 -->
                <div class="step-card-v2">
                    <div class="step-badge-wrap">
                        <span class="step-badge-num">04</span>
                    </div>
                    <h3>Assist with implementation</h3>
                    <p>Depending on the requirement, this may involve investment execution support, tax-related work, GST compliance, financial data preparation or related follow-through.</p>
                </div>
                <!-- Step 05 -->
                <div class="step-card-v2">
                    <div class="step-badge-wrap">
                        <span class="step-badge-num">05</span>
                    </div>
                    <h3>Continue where needed</h3>
                    <p>Where relevant, I continue to stay involved through follow-ups, periodic reviews and ongoing coordination so that things remain on track.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Who I Work With Section -->
    <section class="services-who-section container">
        <h2 class="section-title-v2">Who I Work With</h2>
        <div class="who-badges-grid-v2">
            <!-- Badge 1 -->
            <div class="who-badge-card-v2">
                <div class="who-badge-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <div class="who-badge-text">
                    <h3>Salaried individuals</h3>
                    <p>looking for support with investments, tax planning and return filing.</p>
                </div>
            </div>
            <!-- Badge 2 -->
            <div class="who-badge-card-v2">
                <div class="who-badge-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <div class="who-badge-text">
                    <h3>Self-employed professionals</h3>
                    <p>who need help with GST, tax compliance, financial organisation and investment-related matters.</p>
                </div>
            </div>
            <!-- Badge 3 -->
            <div class="who-badge-card-v2">
                <div class="who-badge-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="who-badge-text">
                    <h3>Individuals and families</h3>
                    <p>looking to keep investments, tax responsibilities and financial records better coordinated.</p>
                </div>
            </div>
            <!-- Badge 4 -->
            <div class="who-badge-card-v2">
                <div class="who-badge-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                </div>
                <div class="who-badge-text">
                    <h3>NRIs and globally connected clients</h3>
                    <p>where relevant, offerings and practical support may apply.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Banner: Looking for support? -->
    <section class="services-footer-banner container">
        <div class="cta-split-v2">
            <div class="cta-text-v2">
                <div class="cta-message-icon-wrap">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <div class="cta-message-text">
                    <h3>Looking for support with investments, taxation or financial organisation?</h3>
                    <p>If you'd like to understand whether my services/way of working are relevant for your requirements, feel free to get in touch.</p>
                </div>
            </div>
            <div class="cta-actions-v2">
                <a href="{{ route('contact') }}" class="button button-primary">GET IN TOUCH</a>
                <a href="{{ route('contact') }}" class="button button-outline-white">CONTACT ME</a>
            </div>
        </div>
        <div class="services-disclosure-row">
            <div class="disc-logo-wrap">
                <svg viewBox="0 0 100 115" width="24" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="50,5 95,30 95,80 50,105 5,80 5,30" stroke="#a77e39" stroke-width="8" stroke-linejoin="round"/>
                    <path d="M50,5 V55 L95,80" stroke="#a77e39" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <p>Mutual fund related services are offered in my capacity as a SEBI-registered Mutual Fund Distributor (MFD). Other professional and compliance services are offered through the practice as applicable.</p>
        </div>
    </section>
</div>
@endsection
