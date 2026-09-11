<?php

declare(strict_types=1);

// One-time script: sync site content updates. Delete after running.

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

header('Content-Type: text/plain; charset=utf-8');

$updates = [
    ['services', 'title', 'A practical approach to investments, taxation and financial organisation.'],
    ['services', 'lead', 'At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.'],
    ['services', 'lead2', 'The aim is to make important financial matters easier to manage — whether that involves investing, tax filings, GST-related work, or keeping financial records and information in better order.'],
    ['about', 'hero_image', 'assets/mitali-profile.png'],
    ['contact', 'hero_image', 'assets/mitali-profile-glasses.png'],
    ['books', 'author_image', 'assets/mitali-profile-black.png'],
    ['books', 'author_title', 'Mitali Mehta'],
    ['books', 'author_p1', 'Mitali Mehta is a Chartered Accountant, Certified Financial Planner and Lawyer based in Ahmedabad. She is the author of The Second Half of Zindagi!, a practical guide to retirement planning that looks at money, life and the transition into the second half with equal seriousness.'],
    ['settings', 'og_image', 'assets/mitali-profile-brand-1.png'],
];

foreach ($updates as [$page, $key, $value]) {
    $count = DB::table('site_contents')
        ->where('page', $page)
        ->where('key', $key)
        ->update(['value' => $value]);

    echo "Updated {$page}.{$key}: {$count} row(s)\n";
}

foreach (
    [
        ['books', 'buy_link', '/contact'],
        ['books', 'sample_link', '/books#inside'],
    ] as [$page, $key, $value]
) {
    $count = DB::table('site_contents')
        ->where('page', $page)
        ->where('key', $key)
        ->where(function ($query) {
            $query->whereNull('value')->orWhere('value', '');
        })
        ->update(['value' => $value]);

    echo "Filled empty {$page}.{$key}: {$count} row(s)\n";
}

echo "Done.\n";
