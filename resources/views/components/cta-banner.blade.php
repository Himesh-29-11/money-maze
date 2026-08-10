@props(['title', 'copy', 'primary' => 'Get in touch', 'primaryRoute' => 'contact', 'secondary' => null, 'secondaryRoute' => 'contact', 'variant' => 'dark'])<section class="container cta-banner cta-{{ $variant }}">
    <div class="cta-orb" aria-hidden="true">✦</div>
    <div class="cta-copy"><h2>{{ $title }}</h2><p>{{ $copy }}</p></div>
    <div class="cta-actions">
        <a class="button button-primary" href="{{ route($primaryRoute) }}">{{ $primary }} <span aria-hidden="true">→</span></a>
        @if ($secondary)<a class="button button-outline" href="{{ route($secondaryRoute ?: 'contact') }}">{{ $secondary }} <span aria-hidden="true">→</span></a>@endif
    </div>
</section>
