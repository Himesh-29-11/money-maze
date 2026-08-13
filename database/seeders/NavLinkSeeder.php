<?php

namespace Database\Seeders;

use App\Models\NavLink;
use Illuminate\Database\Seeder;

class NavLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['Home', '/'],
            ['About', '/about'],
            ['Services', '/services'],
            ['Insights', '/insights'],
            ['Media & Features', '/media-features'],
            ['Books', '/books'],
            ['Testimonials', '/testimonials'],
            ['Resources', '/resources'],
            ['Contact', '/contact'],
        ];

        foreach ($links as $i => [$label, $url]) {
            NavLink::query()->updateOrCreate(['label' => $label, 'url' => $url], ['sort' => $i + 1, 'active' => true]);
        }
    }
}
