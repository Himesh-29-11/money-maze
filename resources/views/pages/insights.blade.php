@extends('layouts.app')

@section('title', 'Insights — Money Maze')

@section('content')
<div class="insights-page-v2">
    <!-- Hero Section: Split Column -->
    <section class="insights-hero-section">
        <div class="container hero-grid-v2">
            <div class="hero-text-col">
                <p class="eyebrow">INSIGHTS</p>
                <h1>Articles, columns and financial perspectives across <span>investing</span>, <span>taxation</span>, <span>retirement</span> and <span>personal finance</span>.</h1>
                <div class="hero-body-text">
                    <p>This section brings together my written work across personal finance, retirement, taxation, investing, IPOs and related financial topics. It includes published newspaper articles, practical financial explainers and English translations of Gujarati-language pieces, all organised in one place for readers who want to explore financial ideas in greater depth.</p>
                </div>
            </div>
            <div class="hero-image-col">
                <img src="{{ asset('assets/crops/insights-hero.jpg') }}" alt="Insights and writing desk">
            </div>
        </div>
    </section>

    <!-- Featured Insights Section -->
    <section class="featured-insights-section container">
        @php
            $topicTags = [
                'Retirement planning' => 'retirement',
                'Taxation' => 'taxation',
                'Investing' => 'investing',
                'IPOs & offerings' => 'ipo',
                'Insurance' => 'insurance',
                'Children & money' => 'children',
            ];
        @endphp
        <h2 class="section-title-v2">FEATURED INSIGHTS</h2>
        <div class="featured-insights-grid">
            @foreach ($articles as $index => $article)
            <article class="featured-insight-card" data-topic="{{ strtolower($article['topic']) }}" data-search="{{ strtolower($article['title'].' '.$article['topic'].' '.($article['publication'] ?? '')) }}">
                <div class="card-thumb">
                    <img src="{{ asset('assets/crops/insights-'.($index + 1).'.jpg') }}" alt="{{ $article['title'] }} thumbnail">
                </div>
                <div class="card-content">
                    <span class="topic-tag tag-{{ $topicTags[$article['topic']] ?? 'sage' }}">{{ strtoupper($article['topic']) }}</span>
                    <h3>{{ $article['title'] }}</h3>
                    <p class="meta-info">{{ $article['publication'] }} <span>·</span> {{ $article['date'] }}</p>
                    <div class="card-links">
                        <a href="{{ $article['english_url'] ?? route('insights.show', $article['slug']) }}" class="link-english">Read English Version <span>→</span></a>
                        <a href="{{ $article['gujarati_url'] ?? route('insights.show', $article['slug']) }}" class="link-gujarati">View Gujarati Publication <span>→</span></a>
                    </div>
                </div>
            </article>
            @endforeach</div>
    </section>

    <!-- Browse Insights by Topic Section -->
    <section class="browse-topics-section container">
        <h2 class="section-title-v2">BROWSE INSIGHTS BY TOPIC</h2>
        <div class="topics-chips-row">
            <button class="topic-chip-btn is-selected" data-filter="all">
                <span class="chip-icon">◈</span>
                <span class="chip-label">All Topics</span>
            </button>
            <button class="topic-chip-btn" data-filter="retirement">
                <span class="chip-icon">🪑</span>
                <span class="chip-label">Retirement Planning</span>
            </button>
            <button class="topic-chip-btn" data-filter="personal">
                <span class="chip-icon">👛</span>
                <span class="chip-label">Personal Finance</span>
            </button>
            <button class="topic-chip-btn" data-filter="taxation">
                <span class="chip-icon">📄</span>
                <span class="chip-label">Taxation &amp; Compliance</span>
            </button>
            <button class="topic-chip-btn" data-filter="investing">
                <span class="chip-icon">📈</span>
                <span class="chip-label">Investing &amp; Products</span>
            </button>
            <button class="topic-chip-btn" data-filter="ipo">
                <span class="chip-icon">🆕</span>
                <span class="chip-label">IPOs &amp; Offerings</span>
            </button>
            <button class="topic-chip-btn" data-filter="insurance">
                <span class="chip-icon">☔</span>
                <span class="chip-label">Insurance</span>
            </button>
            <button class="topic-chip-btn" data-filter="children">
                <span class="chip-icon">👦</span>
                <span class="chip-label">Children &amp; Money</span>
            </button>
            <button class="topic-chip-btn" data-filter="special">
                <span class="chip-icon">⭐</span>
                <span class="chip-label">Special Topics / GIFT City</span>
            </button>
        </div>
    </section>

    <!-- Article Archive Section -->
    <section id="article-archive" class="container archive-section-v2">
        <h2 class="section-title-v2">ARTICLE ARCHIVE</h2>
        <div class="archive-container-v2">
            <!-- Sidebar -->
            <div class="archive-sidebar">
                <div class="archive-sidebar-card">
                    <div class="sidebar-icon-wrap">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#5a6f5c" stroke-width="1.5">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <h3>150+ Articles and Growing</h3>
                    <p>A comprehensive archive of published articles and financial writing across multiple topics.</p>
                </div>
            </div>
            <!-- Main Content: Filters + Table -->
            <div class="archive-main-v2">
                <div class="archive-toolbar-v2">
                    <div class="search-input-wrap">
                        <span class="search-icon">⌕</span>
                        <input id="article-search" type="search" placeholder="Search articles by title, keyword or topic..." aria-label="Search articles">
                    </div>
                    <div class="toolbar-dropdowns">
                        <select aria-label="Filter by Topic">
                            <option>All Topics</option>
                        </select>
                        <select aria-label="Filter by Publication">
                            <option>All Publications</option>
                        </select>
                        <select aria-label="Filter by Year">
                            <option>All Years</option>
                        </select>
                        <select aria-label="Sort Articles">
                            <option>Latest First</option>
                        </select>
                    </div>
                </div>
                <!-- Archive Table -->
                <div class="archive-table-v2">
                    <div class="table-header-row">
                        <span>ARTICLE</span>
                        <span>TOPIC</span>
                        <span>PUBLICATION</span>
                        <span>DATE</span>
                        <span>ACTIONS</span>
                    </div>
                    <!-- Row 1 -->
                    <div class="table-body-row" data-topic="taxation" data-search="smart tax planning for salaried individuals key deductions exemptions and strategies to legally reduce your tax liability. taxation mumbai samachar 05 may 2024">
                        <span class="cell-article">
                            <strong>Smart Tax Planning for Salaried Individuals</strong>
                            <small>Key deductions, exemptions and strategies to legally reduce your tax liability.</small>
                        </span>
                        <span class="cell-topic"><span class="table-tag tag-tax">Taxation</span></span>
                        <span class="cell-pub">Mumbai Samachar</span>
                        <span class="cell-date">05 May 2024</span>
                        <span class="cell-actions">
                            <a href="#">Read English</a>
                            <a href="#">View Gujarati</a>
                        </span>
                    </div>
                    <!-- Row 2 -->
                    <div class="table-body-row" data-topic="retirement" data-search="retirement corpus: how much is enough? a practical framework to estimate your retirement needs and build a secure corpus. retirement capital world 02 may 2024">
                        <span class="cell-article">
                            <strong>Retirement Corpus: How Much Is Enough?</strong>
                            <small>A practical framework to estimate your retirement needs and build a secure corpus.</small>
                        </span>
                        <span class="cell-topic"><span class="table-tag tag-ret">Retirement</span></span>
                        <span class="cell-pub">Capital World</span>
                        <span class="cell-date">02 May 2024</span>
                        <span class="cell-actions">
                            <a href="#">Read English</a>
                            <a href="#">View Gujarati</a>
                        </span>
                    </div>
                    <!-- Row 3 -->
                    <div class="table-body-row" data-topic="ipo" data-search="understanding ipos: key things to consider important factors every investor should evaluate before investing in an ipo. ipo business guardian 28 apr 2024">
                        <span class="cell-article">
                            <strong>Understanding IPOs: Key Things to Consider</strong>
                            <small>Important factors every investor should evaluate before investing in an IPO.</small>
                        </span>
                        <span class="cell-topic"><span class="table-tag tag-ip">IPO</span></span>
                        <span class="cell-pub">Business Guardian</span>
                        <span class="cell-date">28 Apr 2024</span>
                        <span class="cell-actions">
                            <a href="#">Read English</a>
                            <a href="#">View Gujarati</a>
                        </span>
                    </div>
                    <!-- Row 4 -->
                    <div class="table-body-row" data-topic="children" data-search="teaching kids about money: start early simple ways to build money awareness and good financial habits in children. children & money mumbai samachar 21 apr 2024">
                        <span class="cell-article">
                            <strong>Teaching Kids About Money: Start Early</strong>
                            <small>Simple ways to build money awareness and good financial habits in children.</small>
                        </span>
                        <span class="cell-topic"><span class="table-tag tag-ch">Children &amp; Money</span></span>
                        <span class="cell-pub">Mumbai Samachar</span>
                        <span class="cell-date">21 Apr 2024</span>
                        <span class="cell-actions">
                            <a href="#">Read English</a>
                            <a href="#">View Gujarati</a>
                        </span>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="archive-pagination-v2">
                    <span class="page-num active">1</span>
                    <span class="page-num">2</span>
                    <span class="page-num">3</span>
                    <span class="page-dots">...</span>
                    <span class="page-num">8</span>
                    <span class="page-num">9</span>
                    <span class="page-next">Next <span>→</span></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Dark Banner -->
    <section class="insights-footer-banner container">
        <div class="dark-banner-content">
            <div class="cta-message-text">
                <h3>Explore financial ideas, one topic at a time.</h3>
                <p>Whether you are looking for a practical tax explainer, a retirement perspective, or a piece on personal finance, this section is designed to make that journey easier to navigate.</p>
            </div>
            <div class="cta-actions-v2">
                <a href="#article-archive" class="button button-primary">BROWSE ARTICLES</a>
                <a href="#article-archive" class="button button-outline-white">EXPLORE BY TOPIC</a>
            </div>
        </div>
    </section>
</div>
@endsection
