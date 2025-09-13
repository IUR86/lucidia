<?php

namespace Database\Seeders;

use App\Enum\RoleKinds;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'マスター',
            'kinds' => RoleKinds::ADMIN
        ]);
    }
}
