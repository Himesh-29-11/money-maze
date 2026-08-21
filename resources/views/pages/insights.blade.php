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
    <div class="insi-cards">@foreach ($articles as $i => $a)<article class="insi-card"><div class="insi-card-img"><img loading="lazy" decoding="async" src="{{ $a['image'] ?? asset('assets/crops/insights2-'.($i % 6 + 1).'.jpg') }}" alt="{{ $a['title'] }}"></div><div class="insi-card-body"><p class="insi-topic tc-{{ $i % 6 }}">{{ $a['topic'] }}</p><h3>{{ $a['title'] }}</h3><p class="insi-meta">{{ $a['publication'] }}</p><p class="insi-meta"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4"/><path d="M16 3v4"/><path d="M3 10h18"/></svg> {{ $a['date'] }}</p><a class="text-link insi-link" href="{{ $a['english_url'] ?? '#' }}">Read English Version <span class="arrow-icon">→</span></a><a class="text-link insi-link" href="{{ $a['gujarati_url'] ?? '#' }}">View Gujarati Publication <span class="arrow-icon">→</span></a></div></article>@endforeach</div>
</section>

<section class="container insi-sec" id="topics">
    <div class="insi-head"><span></span><h2>{{ $c('insights.topics_title', 'TOPICS I WRITE ABOUT') }}</h2><span></span></div>
    <div class="topic-tiles">
        <button type="button" class="insi-chip topic-tile" data-filter="retirement planning">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2h12"/><path d="M6 22h12"/><path d="M8 2v2.5L12 10l4-5.5V2"/><path d="M8 22v-2.5L12 14l4 5.5V22"/></svg>
            <span>Retirement<br>Planning</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="personal finance">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7H5a2 2 0 0 1 0-4h13v4"/><path d="M20 7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5"/><circle cx="16.5" cy="13.5" r="1"/></svg>
            <span>Personal<br>Finance</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="taxation">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M16 13H8"/><path d="M16 17H8"/><path d="M10 9H8"/></svg>
            <span>Taxation &amp;<br>Compliance</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="investing">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
            <span>Investing &amp;<br>Financial Products</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="ipos &amp; offerings">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.28-.02-3.02a2.2 2.2 0 0 0-2.98.02z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>
            <span>IPOs &amp; New<br>Offerings</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="insurance">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 11.5l2 2 4-4"/></svg>
            <span>Insurance</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="children &amp; money">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22v-10"/><path d="M12 12c0-4 3-7 7-7 0 4-3 7-7 7z"/><path d="M12 15c0-3-2.5-5-5.5-5 0 3 2.5 5 5.5 5z"/></svg>
            <span>Children &amp;<br>Money</span>
        </button>
        <button type="button" class="insi-chip topic-tile" data-filter="special topics">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a13.8 13.8 0 0 1 0 18 13.8 13.8 0 0 1 0-18z"/></svg>
            <span>Special Topics:<br>NRI / GIFT City</span>
        </button>
    </div>
    <p class="topic-tiles-hint">Tap one or more topics to filter the articles below — tap again to remove.</p>
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
            <div class="insi-toolbar"><label class="search-box"><span>⌕</span><input id="article-search" type="search" placeholder="Search articles by title, keyword or topic..."></label><select id="insi-filter-topic" aria-label="Filter by topic"><option value="">All Topics</option><option>Retirement</option><option>Taxation</option><option>IPO</option><option>Children & Money</option></select><select id="insi-filter-pub" aria-label="Filter by publication"><option value="">All Publications</option><option>Mumbai Samachar</option><option>Capital World</option><option>Business Guardian</option></select><select id="insi-filter-year" aria-label="Filter by year"><option value="">All Years</option><option>2024</option></select><select id="insi-sort" aria-label="Sort"><option value="desc">Latest First</option><option value="asc">Oldest First</option></select></div><div class="archive-table insi-table"><div class="archive-row archive-head"><span class="th-spacer"></span><span>Article</span><span>Topic</span><span>Publication</span><span>Date</span><span>Actions</span></div>@foreach ($articles as $i => $a)<div class="archive-row article-row" data-topic="{{ strtolower($a['topic']) }}" data-pub="{{ $a['publication'] }}" data-date="{{ $a['iso'] ?? '' }}" data-search="{{ strtolower($a['title'].' '.$a['topic'].' '.$a['publication']) }}"><span class="insi-thumb"><img loading="lazy" decoding="async" src="{{ $a['image'] ?? asset('assets/crops/insights2-'.($i % 6 + 1).'.jpg') }}" alt="{{ $a['title'] }}"></span><span><strong>{{ $a['title'] }}</strong><small>{{ $a['excerpt'] }}</small></span><span class="tag tag-sage">{{ $a['topic'] }}</span><span>{{ $a['publication'] }}</span><span class="insi-date"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4"/><path d="M16 3v4"/><path d="M3 10h18"/></svg> {{ $a['date'] }}</span><span class="insi-actions"><a href="{{ $a['english_url'] ?? '#' }}">Read English</a><a href="{{ $a['gujarati_url'] ?? '#' }}">View Gujarati</a></span></div>@endforeach</div><div class="insi-pager" id="insi-pager"></div>
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
