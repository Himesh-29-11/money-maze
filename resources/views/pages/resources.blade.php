@extends('layouts.app')

@section('title', 'Resources & Calculators — Money Maze')

@section('content')
<div class="resources-page-v2">
    <!-- Hero Section: Split Column -->
    <section class="resources-hero-section">
        <div class="container hero-grid-v2">
            <div class="hero-text-col">
                <p class="eyebrow">RESOURCES &amp; CALCULATORS</p>
                <h1>Practical tools, worksheets and <span>financial calculators</span> designed to help you turn ideas into action.</h1>
                <div class="hero-body-text">
                    <p>Whether you are planning for retirement, reviewing your cash flow, working through a chapter of <em>The Second Half of Zindagi!</em> or simply trying to organise your finances better, this page brings together practical tools that can help you move from concept to clarity.</p>
                </div>
                <div class="hero-actions">
                    <a href="#calculator-library" class="button button-primary">Explore Calculators <span>→</span></a>
                    <a href="#checklist-library" class="button button-outline">View Checklists &amp; Worksheets</a>
                </div>
            </div>
            <div class="hero-image-col resources-hero-img-wrap">
                <img src="{{ asset('assets/crops/resources-1.jpg') }}" alt="The Second Half of Zindagi book" class="hero-book-mockup">
                <div class="qr-code-card-v2">
                    <div class="qr-icon-placeholder">▦</div>
                    <div class="qr-text">
                        <strong>Reading the book?</strong>
                        <p>Scan the QR code inside to come directly to the relevant tools and worksheets.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 1: Companion tools -->
    <section class="resources-section companion-section container">
        <div class="section-header-v2">
            <div class="header-num-badge">1</div>
            <div class="header-text-block">
                <h2>USING A QR CODE FROM THE BOOK? START HERE.</h2>
                <p>This section is designed as a practical companion to <em>The Second Half of Zindagi!</em>. Use these tools to apply the ideas from the book and strengthen your planning.</p>
            </div>
        </div>
        
        <div class="companion-tools-grid">
            @foreach ([
                ['Retirement Corpus Calculator', 'Estimate the corpus that may be required for your retirement based on expenses, age and inflation.', route('calculators.show', 'retirement'), '◫'],
                ['Retirement Expense Inflation Calculator', 'Understand how today’s expenses may grow over time and why inflation matters.', '#', '↗'],
                ['Retirement Bucket Planning Worksheet', 'Plan how to allocate across liquidity, income, stability and long-term growth buckets.', '#', '◒'],
                ['Retirement Income / Withdrawal Calculator', 'See how different withdrawal amounts and returns impact the sustainability of your corpus.', route('calculators.show', 'swp'), '₹'],
                ['Emergency Fund Calculator', 'Estimate an appropriate emergency reserve based on expenses and responsibilities.', '#', '✓'],
                ['Net Worth & Asset Mapping Worksheet', 'Organise your assets, liabilities, ownership details and key financial information.', '#', '◯'],
                ['Insurance Review Checklist', 'Review your protection needs and key insurance areas in a structured way.', '#', '♢'],
                ['Estate Planning Checklist', 'A step-by-step checklist for wills, nominations, documents and important planning.', '#', '▤'],
                ['Retirement Readiness Self-Assessment', 'Assess your financial and practical readiness for a secure and meaningful retirement.', '#', '☷']
            ] as $tool)
            <div class="companion-tool-card">
                <div class="tool-icon-disc">{{ $tool[3] }}</div>
                <h3>{{ $tool[0] }}</h3>
                <p>{{ $tool[1] }}</p>
                <a href="{{ $tool[2] }}" class="tool-action-link">Open Tool <span>→</span></a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section 2 & 3: Calculators & Checklists (2 Column Layout) -->
    <div class="library-columns-grid container">
        <!-- Column Left: Financial Calculators -->
        <section id="calculator-library" class="resources-section library-column">
            <div class="section-header-v2">
                <div class="header-num-badge">2</div>
                <div class="header-text-block">
                    <h2>FINANCIAL CALCULATORS</h2>
                </div>
            </div>

            <div class="library-groups-wrap">
                <!-- Group 1 -->
                <div class="library-group">
                    <h3>Investment &amp; Goal Calculators</h3>
                    <div class="library-links-list">
                        <a href="{{ route('calculators.show', 'sip') }}">
                            <span><strong>SIP Calculator</strong><small>See how regular investing can grow over time.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="#">
                            <span><strong>Lumpsum Growth Calculator</strong><small>Estimate how a one-time investment may grow.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="#">
                            <span><strong>Goal Planning Calculator</strong><small>Work backwards from your goal and plan better.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="#">
                            <span><strong>Inflation Impact Calculator</strong><small>Understand how inflation affects future costs.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                    </div>
                </div>

                <!-- Group 2 -->
                <div class="library-group">
                    <h3>Retirement Calculators</h3>
                    <div class="library-links-list">
                        <a href="{{ route('calculators.show', 'retirement') }}">
                            <span><strong>Retirement Corpus Calculator</strong><small>Estimate the corpus needed for retirement.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="{{ route('calculators.show', 'swp') }}">
                            <span><strong>Retirement Income / Withdrawal Calculator</strong><small>Model withdrawals and see how long your corpus may last.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="#">
                            <span><strong>Retirement Expense Inflation Calculator</strong><small>Project how expenses may evolve at retirement.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                    </div>
                </div>

                <!-- Group 3 -->
                <div class="library-group">
                    <h3>Cash Flow &amp; Protection Tools</h3>
                    <div class="library-links-list">
                        <a href="#">
                            <span><strong>Emergency Fund Calculator</strong><small>Estimate the right emergency reserve for you.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="{{ route('calculators.show', 'life-insurance') }}">
                            <span><strong>Insurance Need Snapshot</strong><small>Get a broad view of protection needs and gaps.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                    </div>
                </div>

                <!-- Group 4 -->
                <div class="library-group">
                    <h3>Borrowing &amp; Liability Tools</h3>
                    <div class="library-links-list">
                        <a href="#">
                            <span><strong>Loan EMI Calculator</strong><small>Compare EMIs across loan amount, rate and tenure.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                        <a href="#">
                            <span><strong>Loan Prepayment Calculator</strong><small>See how prepayments can reduce interest and tenure.</small></span>
                            <span class="chevron-arrow">›</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Column Right: Checklists & Worksheets -->
        <section id="checklist-library" class="resources-section library-column">
            <div class="section-header-v2">
                <div class="header-num-badge">3</div>
                <div class="header-text-block">
                    <h2>CHECKLISTS &amp; WORKSHEETS</h2>
                </div>
            </div>

            <div class="library-groups-wrap">
                <!-- Group 1 -->
                <div class="library-group">
                    <h3>Planning Worksheets</h3>
                    <div class="library-links-list">
                        <a href="#">
                            <span><strong>Monthly Cash Flow Worksheet</strong><small>Track income, expenses and savings monthly.</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                        <a href="#">
                            <span><strong>Net Worth Worksheet</strong><small>List assets, liabilities and calculate your net worth.</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                        <a href="#">
                            <span><strong>Goal Mapping Worksheet</strong><small>Map goals, timelines, future costs and savings.</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                        <a href="#">
                            <span><strong>Annual Money Horizon Worksheet</strong><small>Review progress, rebalance and plan your actions.</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                    </div>
                </div>

                <!-- Group 2 -->
                <div class="library-group">
                    <h3>Retirement &amp; Family Preparedness Checklists</h3>
                    <div class="library-links-list">
                        @foreach ($checklists as $checklist)
                        <a href="{{ asset('downloads/'.$checklist['file']) }}" download>
                            <span><strong>{{ $checklist['title'] }}</strong><small>{{ $checklist['description'] }}</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Group 3 -->
                <div class="library-group">
                    <h3>Tax &amp; Compliance Checklists</h3>
                    <div class="library-links-list">
                        <a href="#">
                            <span><strong>Income Tax Return Documents Checklist</strong><small>Checklist of documents needed for ITR filing.</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                        <a href="#">
                            <span><strong>GST Registration / Compliance Checklist</strong><small>Understand basic documents for GST compliance.</small></span>
                            <span class="download-arrow">↓</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Section 4: A Note On Using These Tools -->
    <section class="resources-note-section-v2 container">
        <div class="note-grid-v2">
            <div class="note-image-side">
                <img src="{{ asset('assets/crops/resources-2.jpg') }}" alt="Financial planning sheets and worksheets">
            </div>
            <div class="note-content-side">
                <div class="section-header-v2">
                    <div class="header-num-badge">4</div>
                    <div class="header-text-block">
                        <h2>A NOTE ON USING THESE TOOLS</h2>
                    </div>
                </div>
                <p class="note-desc-lead">These calculators, worksheets and checklists are designed to make financial concepts easier to understand and apply. They can help you organise information, test assumptions and approach financial questions with more structure.</p>
                <p>At the same time, every financial situation comes with its own context, constraints and trade-offs. Calculator outputs depend on the assumptions used and real-life decisions often involve factors that no tool can fully capture.</p>
                <strong>Use these resources as a practical starting point for clarity and preparation.</strong>
            </div>
        </div>
    </section>

    <!-- Section 5: Dark CTA Banner -->
    <section class="resources-footer-banner container">
        <div class="cta-split-v3">
            <div class="cta-message-text">
                <div class="cta-icon-badge-v2">💬</div>
                <div class="cta-message-info">
                    <h3>5. NEED HELP PUTTING THE NUMBERS IN CONTEXT?</h3>
                    <p>If a calculator has raised questions, a worksheet has highlighted gaps or you would like to approach your finances in a more organised way, I'm here to help.</p>
                </div>
            </div>
            <div class="cta-actions-v3">
                <a href="{{ route('services') }}" class="button button-primary">EXPLORE SERVICES</a>
                <a href="{{ route('contact') }}" class="button button-outline-white">GET IN TOUCH</a>
            </div>
        </div>
    </section>
</div>
@endsection
