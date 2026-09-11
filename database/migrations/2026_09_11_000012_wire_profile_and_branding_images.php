<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $updates = [
            ['about', 'hero_image', 'assets/mitali-profile.png'],
            ['contact', 'hero_image', 'assets/mitali-profile-glasses.png'],
            ['books', 'author_image', 'assets/mitali-profile-black.png'],
            ['books', 'author_title', 'Mitali Mehta'],
            ['books', 'author_p1', 'Mitali Mehta is a Chartered Accountant, Certified Financial Planner and Lawyer based in Ahmedabad. She is the author of The Second Half of Zindagi!, a practical guide to retirement planning that looks at money, life and the transition into the second half with equal seriousness.'],
            ['settings', 'og_image', 'assets/mitali-profile-brand-1.png'],
        ];

        foreach ($updates as [$page, $key, $value]) {
            $updated = DB::table('site_contents')
                ->where('page', $page)
                ->where('key', $key)
                ->update(['value' => $value]);

            if ($updated === 0) {
                DB::table('site_contents')->insert([
                    'page' => $page,
                    'section' => match ($page) {
                        'about' => 'Hero',
                        'contact' => 'Hero',
                        'books' => 'Author',
                        'settings' => 'Branding',
                    },
                    'key' => $key,
                    'label' => match ($key) {
                        'hero_image' => 'Hero photo',
                        'author_image' => 'Author photo',
                        'author_title' => 'Author heading',
                        'author_p1' => 'Author bio',
                        'og_image' => 'Social share image',
                        default => $key,
                    },
                    'type' => match ($key) {
                        'hero_image', 'author_image', 'og_image' => 'image',
                        'author_title' => 'text',
                        default => 'textarea',
                    },
                    'value' => $value,
                    'sort' => match ($key) {
                        'hero_image', 'author_image', 'og_image' => 3,
                        'author_title' => 2,
                        'author_p1' => 3,
                        default => 1,
                    },
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        // Image wiring is not reverted automatically.
    }
};
