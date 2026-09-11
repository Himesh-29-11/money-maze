<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $updates = [
            ['services', 'title', 'Support across investments, taxation, compliance and the practical side of managing your financial life.'],
            ['services', 'lead', 'My work spans three areas — Investment Solutions, Taxation & Compliance, and Financial Organisation & Professional Support — covering everything from investment execution and tax filing to documentation and ongoing financial coordination.'],
            ['services', 'lead2', ''],
        ];

        foreach ($updates as [$page, $key, $value]) {
            DB::table('site_contents')
                ->where('page', $page)
                ->where('key', $key)
                ->update(['value' => $value]);
        }

        foreach (
            [
                ['books', 'buy_link', '/contact'],
                ['books', 'sample_link', '/books#inside'],
            ] as [$page, $key, $value]
        ) {
            DB::table('site_contents')
                ->where('page', $page)
                ->where('key', $key)
                ->where(function ($query) {
                    $query->whereNull('value')->orWhere('value', '');
                })
                ->update(['value' => $value]);
        }
    }

    public function down(): void
    {
        // Content alignment is not reverted automatically.
    }
};
