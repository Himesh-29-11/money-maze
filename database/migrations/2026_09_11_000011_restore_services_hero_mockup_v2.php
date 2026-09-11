<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $updates = [
            ['services', 'title', 'A practical approach to investments, taxation and financial organisation.'],
            ['services', 'lead', 'At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.'],
            ['services', 'lead2', 'The aim is to make important financial matters easier to manage — whether that involves investing, tax filings, GST-related work, or keeping financial records and information in better order.'],
        ];

        foreach ($updates as [$page, $key, $value]) {
            DB::table('site_contents')
                ->where('page', $page)
                ->where('key', $key)
                ->update(['value' => $value]);
        }
    }

    public function down(): void
    {
        // Content alignment is not reverted automatically.
    }
};
