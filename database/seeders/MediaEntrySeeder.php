<?php

namespace Database\Seeders;

use App\Models\MediaEntry;
use Illuminate\Database\Seeder;

class MediaEntrySeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['interview', 'POCKET MONEY', 'Children & Money Habits: Building a Strong Foundation', 'News Capital Market TV', 'Topic: Children & Money', 'A conversation on pocket money, financial habits for children and building money confidence early.', 'assets/crops/media2-tv1.jpg', null, 1],
            ['interview', 'RETIRE RICH', 'Retirement Planning: Plan Today, Retire Rich', 'News Capital Market TV', 'Topic: Retirement Planning', 'Discussion on retirement readiness, income planning, corpus creation and living a financially free life.', 'assets/crops/media2-tv2.jpg', null, 2],
            ['video', null, 'What is an IPO? Key Basics Explained', 'Chitralekha – IPO Series', null, null, 'assets/crops/media2-v1.jpg', '02:00', 1],
            ['video', null, 'SME IPOs: What Should Investors Know?', 'Chitralekha – IPO Series', null, null, 'assets/crops/media2-v2.jpg', '02:00', 2],
            ['video', null, 'Why Long-Term Investing Always Wins', 'Because Money Matters', null, null, 'assets/crops/media2-v3.jpg', '02:00', 3],
            ['video', null, 'Emergency Fund: How Much is Enough?', 'Because Money Matters', null, null, 'assets/crops/media2-v4.jpg', '02:00', 4],
            ['video', null, 'Upcoming IPOs: What to Watch For', 'Chitralekha – IPO Series', null, null, 'assets/crops/media2-v5.jpg', '02:00', 5],
            ['podcast', null, 'Retirement Planning in Your 40s', 'Podcast Conversation', null, 'Key steps to take in your 40s to build a secure retirement and financial independence.', 'assets/crops/media2-p1.jpg', '28:19', 1],
            ['podcast', null, 'Tax Planning for Salaried Individuals', 'Podcast Conversation', null, 'Smart tax planning strategies to save more, invest better and stay compliant.', 'assets/crops/media2-p2.jpg', '24:40', 2],
            ['podcast', null, 'Mutual Funds vs Direct Equity', 'Podcast Conversation', null, 'Understanding the right approach for your goals, risk appetite and timeline.', 'assets/crops/media2-p3.jpg', '26:10', 3],
            ['feature', null, 'News Capital Market TV', 'Television Interviews', null, null, null, null, 1],
            ['feature', null, 'Mumbai Samachar', 'Mumbai Samachar Articles & Columns', null, null, null, null, 2],
            ['feature', null, 'Capital World', 'Magazine Articles', null, null, null, null, 3],
            ['feature', null, 'Business Guardian', 'Articles & Contributions', null, null, null, null, 4],
            ['feature', null, 'Chitralekha', 'Video Series – IPOs & Money Matters', null, null, null, null, 5],
            ['feature', null, 'Magazine Interviews', 'Magazine Interviews & Print Features', null, null, null, null, 6],
        ];

        foreach ($rows as $row) {
            [$type, $label, $title, $meta1, $meta2, $description, $image, $duration, $sort] = $row;
            MediaEntry::query()->updateOrCreate(
                ['type' => $type, 'title' => $title],
                compact('label', 'meta1', 'meta2', 'description', 'image', 'duration', 'sort')
            );
        }
    }
}
