@extends('layouts.app')

@section('title', 'Insights — Money Maze')

@section('content')
@php
    $sc = $sc ?? [];
    $c = fn (string $key, string $fallback) => $sc[$key] ?? $fallback;
@endphp
<section class="insi-hero">
    <div class="insi-hero-copy">
        <h1>Insights</h1>
        <p class="insi-lead">{{ $c('insights.lead', 'Articles, explainers and educational content on personal finance, retirement, taxation and related topics.') }}</p>
        <p>{{ $c('insights.body', 'This page brings together my written work — articles, columns and educational pieces created to make financial ideas easier to understand and more relevant to everyday life.') }}</p>
        <div class="hero-actions" style="margin-top:18px;">
            <a class="svch-btn-solid" href="#archive">{{ $c('insights.btn_browse', 'Browse Articles') }} <span>→</span></a>
            <a class="svch-btn-outline" href="#featured">{{ $c('insights.btn_featured', 'Read Featured Pieces') }}</a>
        </div>
    </div>
    <div class="insi-hero-photo"><img src="{{ asset($sc['insights.hero_image'] ?? 'assets/crops/insights2-hero.jpg') }}" alt="Coffee, notebook with handwritten notes, glasses and a gold pen" loading="eager" fetchpriority="high"></div>
</section>

<section class="container insi-sec">
    <div class="insi-find">
        <div class="insi-head"><span></span><h2>{{ $c('insights.find_title', 'WHAT YOU’LL FIND HERE') }}</h2><span></span></div>
        <p>{{ $c('insights.find_p1', 'My writing spans retirement planning, investing, taxation, borrowing, insurance, cash flow, financial habits and long-term money decisions.') }}</p>
        <p>{{ $c('insights.find_p2', 'Some pieces are written for newspapers and publications; others appear here in a website-friendly format for easier reading. This page is meant to be a single home for that written work.') }}</p>
        <p>{!! \App\Support\ContentText::toHtml($c('insights.find_p3', 'My articles and columns regularly appear in publications such as <strong>Mumbai Samachar, Capital World and Business Guardian.</strong>') ) !!}</p>
    </div>
</section>

<section class="container insi-sec" id="featured">
    <div class="insi-head"><span></span><h2>FEATURED INSIGHTS</h2><span></span></div>
    <div class="insi-cards">@foreach ($articles as $i => $a)<article class="insi-card" data-topic="{{ $a['topic_key'] ?? '' }}" data-search="{{ strtolower($a['title'].' '.$a['topic'].' '.$a['publication']) }}"><div class="insi-card-img"><img loading="lazy" decoding="async" src="{{ $a['image'] ?? asset('assets/crops/insights2-'.($i % 6 + 1).'.jpg') }}" alt="{{ $a['title'] }}"></div><div class="insi-card-body"><p class="insi-topic tc-{{ $i % 6 }}">{{ $a['topic'] }}</p><h3>{{ $a['title'] }}</h3><p class="insi-meta">{{ $a['publication'] }}</p><p class="insi-meta"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4"/><path d="M16 3v4"/><path d="M3 10h18"/></svg> {{ $a['date'] }}</p><a class="text-link insi-link" href="{{ $a['english_url'] ?? '#' }}">Read English Version <span class="arrow-icon">→</span></a><a class="text-link insi-link" href="{{ $a['gujarati_url'] ?? '#' }}">View Gujarati Publication <span class="arrow-icon">→</span></a></div></article>@endforeach</div>
</section>

<section id="topics" class="insi-topics-sec">
    <div class="container">
        <div class="insi-head"><span></span><h2>{{ $c('insights.topics_title', 'TOPICS I WRITE ABOUT') }}</h2><span></span></div>
        <div class="insi-topics">
            <button type="button" class="topic-chip insi-chip" data-filter="retirement"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M6 11V7a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v4"/><path d="M4 13a2 2 0 0 1 4 0v3h8v-3a2 2 0 0 1 4 0c0 3-1.5 5-4 5H8c-2.5 0-4-2-4-5z"/><path d="M7 18l-1 3"/><path d="M17 18l1 3"/></svg>Retirement<br>Planning</button>
            <button type="button" class="topic-chip insi-chip" data-filter="finance"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M16 12h5v4h-5a2 2 0 0 1 0-4z"/></svg>Personal<br>Finance</button>
            <button type="button" class="topic-chip insi-chip" data-filter="taxation"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H6a1.5 1.5 0 0 0-1.5 1.5v15A1.5 1.5 0 0 0 6 21h6"/><path d="M8 8h4"/><rect x="13.5" y="11" width="7" height="10" rx="1"/><path d="M15.5 14h3"/><path d="M15.5 17h1"/></svg>Taxation &amp;<br>Compliance</button>
            <button type="button" class="topic-chip insi-chip" data-filter="investing"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16"/><path d="M7 16v-4"/><path d="M12 16V8"/><path d="M17 16v-6"/><path d="M6 8l5-4 3 3 5-4"/></svg>Investing &amp;<br>Financial Products</button>
            <button type="button" class="topic-chip insi-chip" data-filter="ipo"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="12" r="9"/><path d="M9.5 9.5h3a2 2 0 0 1 0 4h-3z"/><path d="M9.5 9.5v5"/></svg>IPOs &amp; New<br>Offerings</button>
            <button type="button" class="topic-chip insi-chip" data-filter="insurance"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a9 9 0 0 1 9 9H3a9 9 0 0 1 9-9z"/><path d="M12 12v6a2 2 0 0 0 4 0"/></svg>Insurance</button>
            <button type="button" class="topic-chip insi-chip" data-filter="children"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="6" r="2.6"/><path d="M9 21v-6l-2 1V12l5-2 5 2v4l-2-1v6"/></svg>Children<br>&amp; Money</button>
            <button type="button" class="topic-chip insi-chip" data-filter="special"><svg viewBox="0 0 24 24" width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a13.8 13.8 0 0 1 0 18 13.8 13.8 0 0 1 0-18z"/></svg>Special Topics /<br>NRI / GIFT City</button>
        </div>
    </div>
</section>

<section class="container insi-sec" id="archive">
    <div class="insi-head"><span></span><h2>ARTICLE ARCHIVE</h2><span></span></div>
    <div class="insi-archive">
        <aside class="insi-count">
            <span class="insi-count-icon"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3h11a1 1 0 0 1 1 1v14"/><path d="M4 7a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"/><path d="M8 9h6"/><path d="M8 13h6"/></svg></span>
            <h3>150+ Articles<br>and Growing</h3>
            <p>A comprehensive archive of published articles and financial writing across multiple topics.</p>
        </aside>
        <div class="insi-table-wrap">
            <div class="insi-toolbar"><label class="search-box"><span>⌕</span><input id="article-search" type="search" placeholder="Search articles by title, keyword or topic..."></label><select id="insi-filter-topic" aria-label="Filter by topic"><option value="">All Topics</option><option>Retirement</option><option>Taxation</option><option>IPO</option><option>Children & Money</option></select><select id="insi-filter-pub" aria-label="Filter by publication"><option value="">All Publications</option><option>Mumbai Samachar</option><option>Capital World</option><option>Business Guardian</option></select><select id="insi-filter-year" aria-label="Filter by year"><option value="">All Years</option><option>2024</option></select><select id="insi-sort" aria-label="Sort"><option value="desc">Latest First</option><option value="asc">Oldest First</option></select></div><div class="archive-table insi-table"><div class="archive-row archive-head"><span class="th-spacer"></span><span>Article</span><span>Topic</span><span>Publication</span><span>Date</span><span>Actions</span></div>@foreach ($articles as $i => $a)<div class="archive-row article-row" data-topic="{{ $a['topic_key'] ?? '' }}" data-pub="{{ $a['publication'] }}" data-date="{{ $a['iso'] ?? '' }}" data-search="{{ strtolower($a['title'].' '.$a['topic'].' '.$a['publication']) }}"><span class="insi-thumb"><img loading="lazy" decoding="async" src="{{ $a['image'] ?? asset('assets/crops/insights2-'.($i % 6 + 1).'.jpg') }}" alt="{{ $a['title'] }}"></span><span><strong>{{ $a['title'] }}</strong><small>{{ $a['excerpt'] }}</small></span><span class="tag tag-sage">{{ $a['topic'] }}</span><span>{{ $a['publication'] }}</span><span class="insi-date"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4"/><path d="M16 3v4"/><path d="M3 10h18"/></svg> {{ $a['date'] }}</span><span class="insi-actions"><a href="{{ $a['english_url'] ?? '#' }}">Read English</a><a href="{{ $a['gujarati_url'] ?? '#' }}">View Gujarati</a></span></div>@endforeach</div><div class="insi-pager" id="insi-pager"></div>
            <p class="insi-empty is-hidden">No articles match the selected filters.</p>
        </div>
    </div>
</section>

<section class="container insi-cta-sec">
    <div class="insi-cta">
        <span class="insi-cta-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M17 2l-5 5-5-5"/></svg></span>
        <div class="insi-cta-copy">
            <h3>{{ $c('insights.cta_title', 'Prefer to watch or listen instead?') }}</h3>
            <p>{{ $c('insights.cta_text', 'For interviews, television appearances, podcasts and other media features, head to Media & Features.') }}</p>
        </div>
        <div class="insi-cta-actions">
            <a class="svch-btn-solid" href="{{ route('media') }}">{{ $c('insights.btn_media', 'Explore Media & Features') }}</a>
            <a class="svch-btn-outline" href="{{ route('contact') }}">{{ $c('insights.btn_contact', 'Get in Touch') }}</a>
        </div>
    </div>
</section>
@endsection
