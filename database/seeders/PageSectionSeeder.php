<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Only sections still referenced by the front-end templates live here.
        // Everything else is managed through Page Content (SiteContent).
        $rows = [
            ['insights', 'topics', 'Topics I Write About', '<ul><li>Retirement planning and retirement preparedness</li><li>Investing and long-term wealth creation</li><li>Tax planning and income tax-related topics</li><li>Insurance, borrowing and other everyday financial decisions</li><li>Personal finance concepts explained in simple, practical terms</li></ul>', 1],
        ];

        foreach ($rows as [$page, $key, $title, $body, $sort]) {
            PageSection::query()->updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['title' => $title, 'body' => $body, 'visible' => true, 'sort' => $sort]
            );
        }

        // One-time cleanup of legacy sections that have been replaced by
        // plain fields in Page Content (they rendered as raw HTML blobs).
        $deprecated = [
            ['home', 'what_i_do'],
            ['services', 'investment'], ['services', 'taxation'], ['services', 'financial_org'],
            ['media', 'appearances'],
            ['books', 'why'], ['books', 'covers'],
            ['testimonials', 'experiences'], ['testimonials', 'hope'],
        ];

        foreach ($deprecated as [$page, $key]) {
            PageSection::query()->where('page', $page)->where('key', $key)->delete();
        }
    }
}
