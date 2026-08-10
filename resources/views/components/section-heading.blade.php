@props(['eyebrow' => null, 'title', 'copy' => null, 'align' => 'center'])
<div class="section-heading text-{{ $align }}">
    @if ($eyebrow)<p class="eyebrow">{{ $eyebrow }}</p>@endif
    <h2>{{ $title }}</h2>
    @if ($copy)<p class="section-copy">{{ $copy }}</p>@endif
</div>
