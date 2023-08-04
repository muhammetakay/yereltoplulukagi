<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yönetici',
            'email' => 'yonetici@yereltoplulukagi.com',
            'email_verified_at' => now(),
            'password' => 'ytadmin028*',
        ]);
    }
}
