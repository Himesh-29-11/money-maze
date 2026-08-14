<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['featured', 'The Second Half of Zindagi!', 'Your Guide to Financial Freedom, Purpose & Well-being in Your Retirement', 'A practical and relatable guide to retirement planning that looks beyond formulas and asks the deeper questions retirement really brings with it.', 'assets/crops/books2-cover.jpg', true, 0],
            ['b1', 'Planning in Your 40s', 'Building Strength for the Future', null, 'assets/crops/books2-s1.jpg', false, 1],
            ['b2', 'Retirement Income That Lasts', 'From Corpus to Cash Flow', null, 'assets/crops/books2-s2.jpg', false, 2],
            ['b3', 'Purpose, Identity & Well-being', 'The Non-Financial Side of Retirement', null, 'assets/crops/books2-s3.jpg', false, 3],
        ];

        foreach ($rows as [$key, $title, $subtitle, $description, $cover, $featured, $sort]) {
            Book::query()->updateOrCreate(['key' => $key], compact('title', 'subtitle', 'description', 'cover', 'featured', 'sort'));
        }
    }
}
