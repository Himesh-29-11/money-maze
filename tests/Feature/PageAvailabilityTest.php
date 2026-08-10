<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_public_pages_are_available(): void
    {
        foreach (['/', '/about', '/services', '/insights', '/media-features', '/books', '/resources', '/testimonials', '/contact'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_calculator_pages_are_available(): void
    {
        foreach (['sip', 'life-insurance', 'retirement', 'swp'] as $slug) {
            $this->get('/calculators/'.$slug)->assertOk();
        }

        $this->get('/calculators/unknown-tool')->assertNotFound();
    }

    public function test_seeded_insight_detail_pages_are_available(): void
    {
        foreach (['retirement-planning-start-early', 'understanding-itr-filing', 'sip-vs-lump-sum', 'ipo-investing-basics', 'insurance-financial-planning', 'pocket-money-children'] as $slug) {
            $this->get('/insights/'.$slug)->assertOk();
        }
    }

    public function test_unknown_insight_slug_returns_404(): void
    {
        $this->get('/insights/not-a-real-article')->assertNotFound();
    }

    public function test_contact_store_persists_message(): void
    {
        $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '9876543210',
            'city' => 'Ahmedabad',
            'category' => 'Tax Planning',
            'message' => 'I would like help with my income tax return.',
        ])->assertRedirect();

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
