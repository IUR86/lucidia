<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\StripeService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stripe_service = new StripeService();

        $user = User::create([
            'name' => '山田太郎',
            'email' => 'ryuuyapro@gmail.com',
            'password' => Hash::make('ryuuya2121b'),
        ]);

        $stripe_service->createUserFromModel($user);
    }
}
