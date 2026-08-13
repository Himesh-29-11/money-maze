<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['Mitali explains complex financial concepts so simply. Her guidance has helped me make confident and well-informed decisions.', 'Rajiv S.', 'Business Owner', 5, 1],
            ['Professional, approachable and extremely knowledgeable. I truly value her holistic approach to my finances.', 'Priya M.', 'HR Professional', 5, 2],
            ['The process feels organised and calm. I know what information is needed and what the next step should be.', 'Ananya K.', 'Salaried Professional', 5, 3],
            ['Clear explanations, practical help and a dependable point of contact. That combination makes a real difference.', 'Mehul P.', 'Entrepreneur', 5, 4],
        ];

        foreach ($rows as [$quote, $author, $role, $rating, $sort]) {
            Testimonial::query()->updateOrCreate(['author' => $author], compact('quote', 'role', 'rating', 'sort'));
        }
    }
}
