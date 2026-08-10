<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            ['title' => 'Retirement Planning: Start Early, Stay Financially Secure', 'slug' => 'retirement-planning-start-early', 'topic' => 'Retirement planning', 'publication' => 'Mumbai Samachar', 'excerpt' => 'Key factors to consider for a comfortable and confident retirement.', 'published_at' => '2024-05-12', 'featured' => true],
            ['title' => 'Understanding ITR Filing for Salaried Individuals', 'slug' => 'understanding-itr-filing', 'topic' => 'Taxation', 'publication' => 'Business Guardian', 'excerpt' => 'A simple guide to documents, deductions and filing your income tax return.', 'published_at' => '2024-04-28', 'featured' => true],
            ['title' => 'SIP vs Lump Sum: Which Approach Works Better?', 'slug' => 'sip-vs-lump-sum', 'topic' => 'Investing', 'publication' => 'Mumbai Samachar', 'excerpt' => 'Understanding two familiar approaches to long-term investing.', 'published_at' => '2024-04-14', 'featured' => true],
            ['title' => 'IPO Investing: What Should You Know?', 'slug' => 'ipo-investing-basics', 'topic' => 'IPOs & offerings', 'publication' => 'Capital World', 'excerpt' => 'Key things to evaluate before subscribing to an IPO.', 'published_at' => '2024-04-07', 'featured' => true],
            ['title' => 'Why Insurance Is an Essential Part of Financial Planning', 'slug' => 'insurance-financial-planning', 'topic' => 'Insurance', 'publication' => 'Mumbai Samachar', 'excerpt' => 'Protection planning is one part of building a resilient financial life.', 'published_at' => '2024-03-24', 'featured' => false],
            ['title' => 'How Much Pocket Money Should You Give Your Child?', 'slug' => 'pocket-money-children', 'topic' => 'Children & money', 'publication' => 'Business Guardian', 'excerpt' => 'Simple ways to build money awareness and good financial habits.', 'published_at' => '2024-03-10', 'featured' => false],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['slug' => $article['slug']], $article);
        }
    }
}
