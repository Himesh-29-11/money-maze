@extends('layouts.app')

@section('title', 'Books — Money Maze')

@section('content')
<div class="books-page-v2">
    <!-- Hero Section: Split Column -->
    <section class="books-hero-section">
        <div class="container hero-grid-v2">
            <div class="hero-text-col">
                <p class="eyebrow">BOOKS</p>
                <h1>Long-form financial writing designed to make retirement planning <span>more practical</span>, <span>relatable</span> and <span>easier to navigate</span>.</h1>
                <div class="hero-body-text">
                    <p>This page brings together my long-form writing in personal finance and retirement planning. Beginning with my first book — <em>The Second Half of Zindagi!</em> — the work reflects the same philosophy that shapes my work across articles, media and client conversations.</p>
                </div>
            </div>
            <div class="hero-image-col books-hero-img-wrap">
                <img src="{{ asset('assets/crops/books-1.jpg') }}" alt="The Second Half of Zindagi book" class="hero-book-mockup">
                <div class="book-quote-bubble">
                    <p>“Retirement is not the end of the road. It is the beginning of your second innings.”</p>
                    <cite>— Mitali Mehta</cite>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Book Block -->
    <section class="featured-book-section container">
        <div class="featured-book-card-v2">
            <div class="featured-book-thumb">
                <img src="{{ asset('assets/crops/books-2.jpg') }}" alt="The Second Half of Zindagi book cover">
            </div>
            <div class="featured-book-details">
                <span class="featured-book-label">FEATURED BOOK</span>
                <h2>The Second Half of Zindagi!</h2>
                <h3>Your Guide to Financial Freedom, Purpose &amp; Well-being in Your Retirement</h3>
                <p class="desc-lead">Retirement is often reduced to a number — a corpus target, a calculator output, or a rough estimate of “how much is enough.” But the reality is far more layered than that.</p>
                <p><em>The Second Half of Zindagi!</em> is a practical and relatable guide to retirement planning that looks beyond formulas and asks the deeper questions retirement really brings — identity, purpose, family dynamics and the emotional shift from earning to living off accumulated wealth.</p>
                <p>Written in an accessible, story-led style, the book combines financial planning with real-life retirement realities to help readers approach this phase of life with greater clarity, confidence and perspective.</p>
                <div class="book-actions-v2">
                    <a href="{{ route('contact') }}" class="button button-primary">EXPLORE THE BOOK</a>
                    <a href="{{ route('contact') }}" class="button button-outline">BUY THE BOOK</a>
                    <a href="#inside-book" class="button button-outline-light">READ SAMPLE CHAPTER</a>
                </div>
            </div>
        </div>
    </section>

    <!-- What the Book Covers -->
    <section class="book-covers-section container">
        <h2 class="section-title-v2">WHAT THE BOOK COVERS</h2>
        <div class="covers-grid-v2">
            <div class="cover-card-v2">
                <span class="cover-icon">⌂</span>
                <h3>Building the Financial Foundation</h3>
                <p>Retirement readiness, setting realistic expectations and beginning with the right groundwork.</p>
            </div>
            <div class="cover-card-v2">
                <span class="cover-icon">◎</span>
                <h3>Designing Your Ideal Retirement</h3>
                <p>Looking beyond numbers to think about lifestyle, purpose, priorities and what you want the second half of life to look like.</p>
            </div>
            <div class="cover-card-v2">
                <span class="cover-icon">✓</span>
                <h3>Protection First</h3>
                <p>Health insurance, emergency reserves, debt, risk management and the protection planning cannot ignore.</p>
            </div>
            <div class="cover-card-v2">
                <span class="cover-icon">♧</span>
                <h3>Age-wise Planning</h3>
                <p>What retirement planning looks like in your 20s, 30s, 40s and 50s.</p>
            </div>
            <div class="cover-card-v2">
                <span class="cover-icon">↗</span>
                <h3>When Things Don’t Go According to Plan</h3>
                <p>Late starts, shortfalls, setbacks, unexpected disruptions and adjustments needed when life moves off-script.</p>
            </div>
            <div class="cover-card-v2">
                <span class="cover-icon">◈</span>
                <h3>Special Retirement Realities</h3>
                <p>Retirement planning for women, changing family structures, emotional transitions and other realities.</p>
            </div>
            <div class="cover-card-v2">
                <span class="cover-icon">✦</span>
                <h3>Legacy and Life Beyond Money</h3>
                <p>Estate planning, financial organisation and thinking about purpose, fulfilment and impact.</p>
            </div>
        </div>
    </section>

    <!-- Two Column: Why I Wrote / Who It's For -->
    <section class="book-two-col-section container">
        <div class="two-col-grid-v2">
            <div class="book-panel-card">
                <p class="eyebrow">WHY I WROTE THIS BOOK</p>
                <h2>Retirement planning is more holistic than a corpus number.</h2>
                <p>For many people, retirement is seen only through the lens of investments. But retirement is a life transition shaped by health, inflation, family responsibilities, changing routines, emotional identity, lifestyle choices, financial uncertainty and the question of what life is meant to look like once work is no longer at the centre of it.</p>
                <p>I wrote <em>The Second Half of Zindagi!</em> to make retirement planning more holistic, practical and human — a guide that helps readers think through the money side of retirement as well as the real-life decisions and adjustments that come with it.</p>
            </div>
            <div class="book-panel-card">
                <p class="eyebrow">WHO THIS BOOK IS FOR</p>
                <h2>For anyone preparing for the second half.</h2>
                <ul class="book-check-list">
                    <li>Professionals beginning to think seriously about retirement</li>
                    <li>Individuals in their 40s and 50s organising their finances</li>
                    <li>Couples preparing for the transition into retirement</li>
                    <li>Late starters who feel behind and need a realistic roadmap</li>
                    <li>Families helping parents with retirement decisions</li>
                    <li>Anyone who wants to understand retirement as a financial and life transition</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Inside the Book -->
    <section id="inside-book" class="inside-book-section container">
        <div class="inside-book-grid-v2">
            <div class="inside-text-side">
                <p class="eyebrow">INSIDE THE BOOK</p>
                <h2>A practical guide built around real-life situations and actionable insights.</h2>
                <ul class="book-check-list">
                    <li>Story-led chapters and relatable characters</li>
                    <li>Practical frameworks and simple explanations</li>
                    <li>Real-world issues: inflation, healthcare, shortfalls, late starts and cash flow</li>
                    <li>Age-wise perspectives on changing priorities</li>
                    <li>Financial and non-financial dimensions of retirement</li>
                    <li>Tools, checklists and reflective questions</li>
                </ul>
            </div>
            <div class="inside-visuals-side">
                <div class="sample-pages-row">
                    <div class="sample-page-card">
                        <img src="{{ asset('assets/crops/books-3.jpg') }}" alt="Planning in your 40s page">
                        <h4>Planning in Your 40s</h4>
                    </div>
                    <div class="sample-page-card">
                        <img src="{{ asset('assets/crops/books-4.jpg') }}" alt="Retirement income page">
                        <h4>Retirement Income That Lasts</h4>
                    </div>
                    <div class="sample-page-card">
                        <img src="{{ asset('assets/crops/books-5.jpg') }}" alt="Purpose and well-being page">
                        <h4>Purpose, Identity &amp; Well-being</h4>
                    </div>
                </div>
                <div class="view-samples-btn-wrap">
                    <a href="#" class="view-samples-btn">VIEW SAMPLE PAGES <span>→</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ending Section: Real Questions / Future Books -->
    <section class="book-ending-section container">
        <div class="ending-grid-v2">
            <div class="ending-questions-card">
                <p class="eyebrow">A BOOK ROOTED IN REAL QUESTIONS</p>
                <div class="questions-grid-v2">
                    <div class="question-note-box">How much do I need?</div>
                    <div class="question-note-box">What if I don't want to retire?</div>
                    <div class="question-note-box">How do I balance safety and growth?</div>
                </div>
                <div class="questions-quote-box">
                    <p>“Good retirement planning gives you choices. Great retirement planning gives you freedom.”</p>
                </div>
            </div>
            <div class="ending-future-card">
                <p class="eyebrow">MORE BOOKS &amp; FUTURE WRITING</p>
                <h2>A growing home for long-form writing.</h2>
                <p>This page will continue to grow with future books, long-form writing projects and other published work focused on making financial and life decisions more understandable.</p>
                <p>For now, it serves as the home for <em>The Second Half of Zindagi!</em> — a book built around the belief that retirement planning deserves both financial rigour and human understanding.</p>
            </div>
        </div>
    </section>

    <!-- Bottom Dark Banner -->
    <section class="books-footer-banner container">
        <div class="cta-split-v3">
            <div class="cta-message-text">
                <h3>Explore the second half with greater clarity.</h3>
                <p>If retirement planning feels overwhelming, technical or difficult to begin, the book is designed to make the subject more approachable — one idea, one decision and one chapter at a time.</p>
            </div>
            <div class="cta-actions-v3">
                <a href="{{ route('contact') }}" class="button button-primary">EXPLORE THE BOOK</a>
                <a href="{{ route('insights') }}" class="button button-primary button-darker">READ MY INSIGHTS</a>
                <a href="{{ route('contact') }}" class="button button-outline-white">GET IN TOUCH</a>
            </div>
        </div>
    </section>
</div>
@endsection
