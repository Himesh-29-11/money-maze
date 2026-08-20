<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            PageSectionSeeder::class,
            SiteContentSeeder::class,
            NavLinkSeeder::class,
            TestimonialSeeder::class,
            MediaEntrySeeder::class,
            BookSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
