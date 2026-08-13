<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['home', 'eyebrow', 'Hero eyebrow', 'text', 'CLARITY. STRUCTURE. CONFIDENCE.', 1],
            ['home', 'title', 'Hero headline', 'text', 'Navigate Life’s Financial Decisions with Confidence.', 2],
            ['home', 'byline', 'Hero byline', 'text', 'Mitali Mehta, CA, CFP®', 3],
            ['home', 'lead', 'Hero intro', 'textarea', 'Chartered Accountant and Personal Finance Professional helping individuals, professionals and NRIs navigate taxation, investments and financial decisions with clarity, structure and a long-term perspective.', 4],
            ['home', 'regulatory', 'Regulatory note', 'textarea', 'Mutual fund distribution services are offered as a SEBI-registered Mutual Fund Distributor. Other financial products and professional services are offered through the practice as applicable.', 5],
            ['about', 'title', 'Page title', 'text', 'About Mitali', 1],
            ['about', 'lead', 'Intro paragraph', 'textarea', 'Chartered Accountant, CFP professional, and founder of Money Maze — a practice built around thoughtful financial solutions, tax support and organised financial decision-making for individuals and professionals.', 2],
            ['services', 'title', 'Hero headline', 'textarea', 'A practical approach to investments, taxation and financial organisation.', 1],
            ['services', 'lead', 'Intro paragraph', 'textarea', 'At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.', 2],
            ['books', 'featured_title', 'Featured book title', 'text', 'The Second Half of Zindagi!', 1],
            ['books', 'featured_subtitle', 'Featured book subtitle', 'text', 'Your Guide to Financial Freedom, Purpose & Well-being in Your Retirement', 2],
            ['contact', 'office', 'Office location', 'text', 'Ahmedabad, Gujarat, India', 1],
        ];

        foreach ($rows as [$page, $key, $label, $type, $value, $sort]) {
            SiteContent::query()->updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['label' => $label, 'type' => $type, 'value' => $value, 'sort' => $sort]
            );
        }
    }
}
