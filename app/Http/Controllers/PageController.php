<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', $this->shared());
    }

    public function about(): View
    {
        return view('pages.about', $this->shared());
    }

    public function services(): View
    {
        return view('pages.services', $this->shared());
    }

    public function insights(): View
    {
        return view('pages.insights', array_merge($this->shared(), ['articles' => $this->articles()]));
    }

    public function insightDetail(string $slug): View
    {
        try {
            $article = Article::query()->where('slug', $slug)->first();
        } catch (\Throwable) {
            // Database not migrated yet — fall back to the curated list below.
            $article = null;
        }

        if ($article) {
            $article = [
                'title' => $article->title,
                'slug' => $article->slug,
                'topic' => $article->topic,
                'publication' => $article->publication,
                'date' => $article->published_at?->format('d M Y'),
                'excerpt' => $article->excerpt,
                'english_url' => $article->english_url,
                'gujarati_url' => $article->gujarati_url,
            ];
        } else {
            $article = collect($this->articles())->firstWhere('slug', $slug);
        }

        abort_unless($article, 404);

        return view('pages.insight-detail', [
            ...$this->shared(),
            'article' => $article,
        ]);
    }

    public function media(): View
    {
        return view('pages.media', array_merge(
            $this->shared(),
            ['articles' => $this->articles()]
        ));
    }

    public function books(): View
    {
        return view('pages.books', $this->shared());
    }

    public function resources(): View
    {
        return view('pages.resources', [
            ...$this->shared(),
            'calculators' => $this->calculators(),
            'checklists' => $this->checklists(),
        ]);
    }

    public function testimonials(): View
    {
        return view('pages.testimonials', $this->shared());
    }

    public function contact(): View
    {
        return view('pages.contact', $this->shared());
    }

    public function calculator(string $slug): View
    {
        $calculator = collect($this->calculators())->firstWhere('slug', $slug);
        abort_unless($calculator, 404);

        return view('calculators.show', [
            ...$this->shared(),
            'calculator' => $calculator,
        ]);
    }

    private function shared(): array
    {
        return [
            'brand' => [
                'name' => 'Money Maze',
                'tagline' => 'Paving Your Financial Path',
                'person' => 'Mitali Mehta',
            ],
            'regulatoryNote' => 'Mitali Mehta is a SEBI-registered Mutual Fund Distributor. Mutual fund investments are subject to market risks; please read all scheme-related documents carefully before investing.',
        ];
    }

    private function calculators(): array
    {
        return [
            [
                'slug' => 'sip',
                'title' => 'SIP Calculator',
                'eyebrow' => 'Investing & growth',
                'description' => 'Explore how a monthly investment may grow with a percentage increase or a fixed annual top-up.',
                'icon' => '↗',
            ],
            [
                'slug' => 'life-insurance',
                'title' => 'Life Insurance Calculator',
                'eyebrow' => 'Protection planning',
                'description' => 'Estimate the life insurance cover your family may need after considering goals, liabilities and resources.',
                'icon' => '◈',
            ],
            [
                'slug' => 'retirement',
                'title' => 'Retirement Corpus Calculator',
                'eyebrow' => 'Retirement planning',
                'description' => 'Estimate a retirement corpus using today’s expenses, inflation, retirement age and expected returns.',
                'icon' => '◒',
            ],
            [
                'slug' => 'swp',
                'title' => 'SWP Calculator',
                'eyebrow' => 'Retirement income',
                'description' => 'Model periodic withdrawals, inflation increases and the possible life of an investment corpus.',
                'icon' => '₹',
            ],
        ];
    }

    private function checklists(): array
    {
        return [
            ['title' => 'Financial Document Checklist', 'file' => 'financial-document-checklist.docx', 'description' => 'Keep important financial records and account information in one place.'],
            ['title' => 'Insurance Review Checklist', 'file' => 'insurance-review-checklist.docx', 'description' => 'Review your protection needs, covers and key policy details methodically.'],
            ['title' => 'Retirement Readiness Checklist', 'file' => 'retirement-readiness-checklist.docx', 'description' => 'Work through the financial and practical questions that shape retirement readiness.'],
        ];
    }

    private function articles(): array
    {
        return [
            ['slug' => 'retirement-planning-start-early', 'title' => 'Retirement Planning: Start Early, Stay Financially Secure', 'topic' => 'Retirement planning', 'publication' => 'Mumbai Samachar', 'date' => '12 May 2024', 'color' => 'sage', 'excerpt' => 'Key factors to consider for a comfortable and confident retirement.'],
            ['slug' => 'understanding-itr-filing', 'title' => 'Understanding ITR Filing for Salaried Individuals', 'topic' => 'Taxation', 'publication' => 'Business Guardian', 'date' => '28 Apr 2024', 'color' => 'gold', 'excerpt' => 'A simple guide to documents, deductions and filing your income tax return.'],
            ['slug' => 'sip-vs-lump-sum', 'title' => 'SIP vs Lump Sum: Which Approach Works Better?', 'topic' => 'Investing', 'publication' => 'Mumbai Samachar', 'date' => '14 Apr 2024', 'color' => 'blue', 'excerpt' => 'Understanding two familiar approaches to long-term investing.'],
            ['slug' => 'ipo-investing-basics', 'title' => 'IPO Investing: What Should You Know?', 'topic' => 'IPOs & offerings', 'publication' => 'Capital World', 'date' => '07 Apr 2024', 'color' => 'green', 'excerpt' => 'Key things to evaluate before subscribing to an IPO.'],
            ['slug' => 'insurance-financial-planning', 'title' => 'Why Insurance Is an Essential Part of Financial Planning', 'topic' => 'Insurance', 'publication' => 'Mumbai Samachar', 'date' => '24 Mar 2024', 'color' => 'lavender', 'excerpt' => 'Protection planning is one part of building a resilient financial life.'],
            ['slug' => 'pocket-money-children', 'title' => 'How Much Pocket Money Should You Give Your Child?', 'topic' => 'Children & money', 'publication' => 'Business Guardian', 'date' => '10 Mar 2024', 'color' => 'peach', 'excerpt' => 'Simple ways to build money awareness and good financial habits.'],
        ];
    }
}
