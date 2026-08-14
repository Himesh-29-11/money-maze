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
        return view('pages.insights', array_merge($this->shared(), ['articles' => $this->articlesPublic()]));
    }

    private function articlesPublic(): array
    {
        try {
            $db = \App\Models\Article::query()->orderByDesc('published_at')->limit(6)->get();
            if ($db->isNotEmpty()) {
                return $db->map(fn ($a) => [
                    'slug' => $a->slug,
                    'title' => $a->title,
                    'topic' => $a->topic,
                    'publication' => $a->publication,
                    'date' => $a->published_at?->format('d M Y'),
                    'excerpt' => $a->excerpt,
                    'english_url' => $a->english_url,
                    'gujarati_url' => $a->gujarati_url,
                    'image' => $a->image ? asset($a->image) : null,
                    'iso' => $a->published_at?->format('Y-m-d'),
                ])->all();
            }
        } catch (\Throwable) {
            // fall through to static list
        }

        return collect($this->articles())->map(fn ($a, $i) => $a + ['image' => asset('assets/crops/insights2-'.($i % 6 + 1).'.jpg'), 'iso' => date('Y-m-d', strtotime($a['date']))])->all();
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
            'sc' => $this->contentMap(),
            'navLinks' => $this->navLinks(),
            'testimonials' => $this->testimonialsData(),
            'books' => $this->booksData(),
            'mediaEntries' => $this->mediaEntries(),
        ];
    }

    private function contentMap(): array
    {
        try {
            return \App\Models\SiteContent::query()->get()
                ->mapWithKeys(fn ($c) => ["{$c->page}.{$c->key}" => $c->value])
                ->all();
        } catch (\Throwable) {
            return [];
        }
    }

    private function navLinks(): array
    {
        try {
            return \App\Models\NavLink::query()->where('active', true)->orderBy('sort')->get()
                ->map(fn ($l) => ['label' => $l->label, 'url' => $l->url])->all();
        } catch (\Throwable) {
            return [];
        }
    }

    private function testimonialsData(): array
    {
        try {
            return \App\Models\Testimonial::query()->orderBy('sort')->get()->map(fn ($t) => [
                'quote' => $t->quote, 'author' => $t->author, 'role' => $t->role, 'rating' => $t->rating,
            ])->all();
        } catch (\Throwable) {
            return [];
        }
    }

    private function booksData(): array
    {
        try {
            return \App\Models\Book::query()->orderBy('sort')->get()->map(fn ($b) => [
                'key' => $b->key, 'title' => $b->title, 'subtitle' => $b->subtitle,
                'description' => $b->description, 'cover' => $b->cover, 'featured' => $b->featured,
            ])->all();
        } catch (\Throwable) {
            return [];
        }
    }

    private function mediaEntries(): array
    {
        try {
            $entries = \App\Models\MediaEntry::query()->orderBy('type')->orderBy('sort')->get()->map(fn ($m) => [
                'type' => $m->type, 'label' => $m->label, 'title' => $m->title, 'meta1' => $m->meta1,
                'meta2' => $m->meta2, 'description' => $m->description, 'image' => $m->image,
                'duration' => $m->duration, 'url' => $m->url,
            ])->all();
        } catch (\Throwable) {
            $entries = [];
        }

        if (! $entries) {
            $entries = $this->defaultMedia();
        }

        foreach ($entries as &$entry) {
            if (empty($entry['url'])) {
                $entry['url'] = 'https://www.youtube.com/results?search_query='.urlencode($entry['title']);
            }
        }

        return $entries;
    }

    private function defaultMedia(): array
    {
        return [
            ['type' => 'interview', 'label' => 'POCKET MONEY', 'title' => 'Children & Money Habits: Building a Strong Foundation', 'meta1' => 'News Capital Market TV', 'meta2' => 'Topic: Children & Money', 'description' => 'A conversation on pocket money, financial habits for children and building money confidence early.', 'image' => 'assets/crops/media2-tv1.jpg', 'duration' => null, 'url' => null],
            ['type' => 'interview', 'label' => 'RETIRE RICH', 'title' => 'Retirement Planning: Plan Today, Retire Rich', 'meta1' => 'News Capital Market TV', 'meta2' => 'Topic: Retirement Planning', 'description' => 'Discussion on retirement readiness, income planning, corpus creation and living a financially free life.', 'image' => 'assets/crops/media2-tv2.jpg', 'duration' => null, 'url' => null],
            ['type' => 'video', 'label' => null, 'title' => 'What is an IPO? Key Basics Explained', 'meta1' => 'Chitralekha – IPO Series', 'meta2' => null, 'description' => null, 'image' => 'assets/crops/media2-v1.jpg', 'duration' => '02:00', 'url' => null],
            ['type' => 'video', 'label' => null, 'title' => 'SME IPOs: What Should Investors Know?', 'meta1' => 'Chitralekha – IPO Series', 'meta2' => null, 'description' => null, 'image' => 'assets/crops/media2-v2.jpg', 'duration' => '02:00', 'url' => null],
            ['type' => 'video', 'label' => null, 'title' => 'Why Long-Term Investing Always Wins', 'meta1' => 'Because Money Matters', 'meta2' => null, 'description' => null, 'image' => 'assets/crops/media2-v3.jpg', 'duration' => '02:00', 'url' => null],
            ['type' => 'video', 'label' => null, 'title' => 'Emergency Fund: How Much is Enough?', 'meta1' => 'Because Money Matters', 'meta2' => null, 'description' => null, 'image' => 'assets/crops/media2-v4.jpg', 'duration' => '02:00', 'url' => null],
            ['type' => 'video', 'label' => null, 'title' => 'Upcoming IPOs: What to Watch For', 'meta1' => 'Chitralekha – IPO Series', 'meta2' => null, 'description' => null, 'image' => 'assets/crops/media2-v5.jpg', 'duration' => '02:00', 'url' => null],
            ['type' => 'podcast', 'label' => null, 'title' => 'Retirement Planning in Your 40s', 'meta1' => 'Podcast Conversation', 'meta2' => null, 'description' => 'Key steps to take in your 40s to build a secure retirement and financial independence.', 'image' => 'assets/crops/media2-p1.jpg', 'duration' => '28:19', 'url' => null],
            ['type' => 'podcast', 'label' => null, 'title' => 'Tax Planning for Salaried Individuals', 'meta1' => 'Podcast Conversation', 'meta2' => null, 'description' => 'Smart tax planning strategies to save more, invest better and stay compliant.', 'image' => 'assets/crops/media2-p2.jpg', 'duration' => '24:40', 'url' => null],
            ['type' => 'podcast', 'label' => null, 'title' => 'Mutual Funds vs Direct Equity', 'meta1' => 'Podcast Conversation', 'meta2' => null, 'description' => 'Understanding the right approach for your goals, risk appetite and timeline.', 'image' => 'assets/crops/media2-p3.jpg', 'duration' => '26:10', 'url' => null],
            ['type' => 'feature', 'label' => null, 'title' => 'News Capital Market TV', 'meta1' => 'Television Interviews', 'meta2' => null, 'description' => null, 'image' => null, 'duration' => null, 'url' => null],
            ['type' => 'feature', 'label' => null, 'title' => 'Mumbai Samachar', 'meta1' => 'Mumbai Samachar Articles & Columns', 'meta2' => null, 'description' => null, 'image' => null, 'duration' => null, 'url' => null],
            ['type' => 'feature', 'label' => null, 'title' => 'Capital World', 'meta1' => 'Magazine Articles', 'meta2' => null, 'description' => null, 'image' => null, 'duration' => null, 'url' => null],
            ['type' => 'feature', 'label' => null, 'title' => 'Business Guardian', 'meta1' => 'Articles & Contributions', 'meta2' => null, 'description' => null, 'image' => null, 'duration' => null, 'url' => null],
            ['type' => 'feature', 'label' => null, 'title' => 'Chitralekha', 'meta1' => 'Video Series – IPOs & Money Matters', 'meta2' => null, 'description' => null, 'image' => null, 'duration' => null, 'url' => null],
            ['type' => 'feature', 'label' => null, 'title' => 'Magazine Interviews', 'meta1' => 'Magazine Interviews & Print Features', 'meta2' => null, 'description' => null, 'image' => null, 'duration' => null, 'url' => null],
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
