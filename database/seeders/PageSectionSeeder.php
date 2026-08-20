<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['home', 'what_i_do', 'What I Do', '<ul><li><strong>Financial Professional</strong> — Investment execution, taxation and financial organisation. <a href="/services">See Services</a>.</li><li><strong>Writer</strong> — Articles and educational content on personal finance. <a href="/insights">See Insights</a>.</li><li><strong>Author</strong> — The Second Half of Zindagi!, a retirement planning book. <a href="/books">See Books</a>.</li><li><strong>Educator</strong> — Television appearances, interviews and financial awareness initiatives. <a href="/media-features">See Media &amp; Features</a>.</li></ul>', 1],
            ['services', 'investment', 'Investment Solutions', '<p>This part of my practice focuses on investment execution and product access for individuals and professionals building, maintaining or reviewing their investment holdings.</p><p>As a SEBI-registered Mutual Fund Distributor, I help clients access and execute a range of investment products. This is a distribution and execution service, not a personalised investment advisory service.</p><ul><li>Mutual funds</li><li>Fixed deposits, corporate bonds and NCDs</li><li>GIFT City investment products and related offerings</li><li>Other investment products, where available</li></ul>', 1],
            ['services', 'taxation', 'Taxation & Compliance', '<p>Tax and compliance work is recurring, deadline-driven and detail-sensitive. This part of my practice supports individuals, professionals and businesses with tax planning, return filing or GST compliance.</p><ol><li><strong>Tax Planning</strong> — Helping individuals and professionals think through their tax outgo more deliberately, within the framework of applicable laws and provisions.</li><li><strong>Income Tax Return Filing</strong> — Preparation and filing of income tax returns, including review of the documents and information the process requires.</li><li><strong>GST Registration</strong> — Support with GST registration for businesses and professionals who need to register under the applicable framework.</li><li><strong>GST Return Filing &amp; Support</strong> — Ongoing GST return filing and compliance support, tailored to the nature of the business and its reporting obligations.</li></ol>', 2],
            ['services', 'financial_org', 'Financial Organisation & Professional Support', '<p>Not every financial need fits under investing or taxation. Sometimes the need is more practical — organising records, pulling together scattered information, or having dependable support for recurring financial tasks.</p><p>This part of my work focuses on improving visibility over documents and accounts, coordinating routine financial tasks, and helping clients stay on top of the administrative side of their finances.</p>', 3],
            ['insights', 'topics', 'Topics I Write About', '<ul><li>Retirement planning and retirement preparedness</li><li>Investing and long-term wealth creation</li><li>Tax planning and income tax-related topics</li><li>Insurance, borrowing and other everyday financial decisions</li><li>Personal finance concepts explained in simple, practical terms</li></ul>', 1],
            ['media', 'appearances', 'Media Appearances', '<p>My work has also extended into interviews, television segments and platform conversations — covering financial education, retirement planning, investing and current financial topics.</p><p>This page is the home for those appearances across video, audio, and interview formats.</p>', 1],
            ['books', 'why', 'Why I Wrote This Book', '<p>Retirement planning is often treated too narrowly — as though the only real question is whether the corpus will be enough.</p><p>In reality, it brings together a much wider set of concerns: income, longevity, health costs, emotional adjustment, changing family roles and the uncertainty of what life after work may look like.</p><p>I wanted to write a book that engages with these questions honestly, without losing sight of the financial foundations that still matter.</p>', 1],
            ['books', 'covers', 'What the Book Covers', '<ul><li>Retirement corpus planning, income strategy and withdrawals</li><li>Inflation, longevity, asset allocation and financial protection</li><li>Retirement planning across different life stages and changing circumstances</li><li>Women and retirement realities, estate planning and legacy</li><li>Purpose, routine, identity and the emotional side of retirement</li></ul>', 2],
            ['testimonials', 'experiences', 'Client Experiences', '<p>Every client’s need is different — some come for investment support, some for tax or GST work, some for financial documentation, and many for a mix of these over time.</p><p><em>Client testimonials will be added here soon.</em></p>', 1],
            ['testimonials', 'hope', 'What I Hope the Experience Reflects', '<p>Beyond technical help, I want clients to feel reliability, responsiveness and confidence that their matters are being handled with care. That’s what I hope this page will reflect, once it’s live.</p>', 2],
        ];

        foreach ($rows as [$page, $key, $title, $body, $sort]) {
            PageSection::query()->updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['title' => $title, 'body' => $body, 'visible' => true, 'sort' => $sort]
            );
        }
    }
}
