<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageAvailabilityTest extends TestCase
{
    public function test_public_pages_are_available(): void
    {
        foreach (['/', '/about', '/services', '/insights', '/media-features', '/books', '/resources', '/testimonials', '/contact'] as $path) {
            $this->get($path)->assertOk();
        }
    }
}
