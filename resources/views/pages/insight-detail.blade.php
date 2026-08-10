@extends('layouts.app')

@section('title', $article['title'].' — Money Maze')

@section('content')
<section class="simple-page-hero">
    <div class="container narrow-content">
        <p class="eyebrow">{{ strtoupper($article['topic'] ?? 'Insights') }}</p>
        <h1>{{ $article['title'] }}</h1>
        <div class="gold-rule"></div>
        @if (!empty($article['publication']))
            <p class="insight-detail-meta">{{ $article['publication'] }}@if (!empty($article['date'])) <span aria-hidden="true">·</span> {{ $article['date'] }}@endif</p>
        @endif
    </div>
</section>

<section class="container narrow-content section-pad insight-detail-body">
    @if (!empty($article['excerpt']))
        <p class="insight-detail-lead">{{ $article['excerpt'] }}</p>
    @endif

    <p>The full article is published in {{ $article['publication'] ?? 'the publication' }}. This page is part of the Money Maze insights archive, where published newspaper articles, practical financial explainers and English translations of Gujarati-language pieces are organised in one place.</p>

    @if (!empty($article['english_url']) || !empty($article['gujarati_url']))
        <div class="insight-detail-links">
            @if (!empty($article['english_url']))
                <a class="button button-primary" href="{{ $article['english_url'] }}" target="_blank" rel="noopener">Read English Version <span aria-hidden="true">→</span></a>
            @endif
            @if (!empty($article['gujarati_url']))
                <a class="button button-outline" href="{{ $article['gujarati_url'] }}" target="_blank" rel="noopener">View Gujarati Publication <span aria-hidden="true">→</span></a>
            @endif
        </div>
    @else
        <p class="insight-detail-note">A direct link to the publication will be added here as it becomes available. For help locating this article, please <a href="{{ route('contact') }}">get in touch</a>.</p>
    @endif
</section>

<x-cta-banner title="Explore more financial insights" copy="Browse the full archive of articles and perspectives across investing, taxation, retirement and personal finance." primary="Back to Insights" primary-route="insights" secondary="Explore resources" secondary-route="resources" variant="light" />
@endsection
