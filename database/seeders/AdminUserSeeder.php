<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'admin@moneymaze.in'],
            ['name' => 'Site Admin', 'password' => Hash::make(config('app.admin_password', 'admin123'))]
        );
    }
}
