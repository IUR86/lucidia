<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'name' => '山田 太郎',
            'email' => 'ryuuyapro@gmail.com',
            'password' => Hash::make('password0'),
        ]);
    }
}
