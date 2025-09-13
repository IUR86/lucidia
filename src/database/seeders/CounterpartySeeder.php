<?php

namespace Database\Seeders;

use App\Models\Counterparty;
use App\Models\Salon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CounterpartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('ja_JP');

        if (app()->environment('local')) {
            for ($index = 0; $index < 10; $index++) {
                $counterparty = Counterparty::create([
                    'name'          => "契約相手{$index}",
                    'email'         => "ryuuyapro+{$index}@gmail.com",
                    'password'      => Hash::make('password0'),
                    'subdomain'     => "test{$index}",
                    'price'         => 100000,
                ]);

                for ($salon_index = 0; $salon_index < 3; $salon_index++) {
                    Salon::create([
                        'counterparty_id' => $counterparty->id,
                        'name'            => $faker->company . " 店舗{$salon_index}",
                        'description'     => $faker->realText(100),
                        'prefecture'      => $faker->numberBetween(1, 47),
                        'postal_code'     => $faker->postcode,
                        'address1'        => $faker->city,
                        'address2'        => $faker->streetAddress,
                        'latitude'        => $faker->latitude(33, 45),
                        'longitude'       => $faker->longitude(130, 140),
                        'tel'             => $faker->phoneNumber,
                        'email'           => $faker->unique()->safeEmail,
                        'opening_time'    => '09:00:00',
                        'closing_time'    => '18:00:00',
                        'regular_holiday' => $faker->randomElement(['日曜', '月曜', '火曜', null]),
                        'website_url'     => $faker->url,
                        'capacity'        => $faker->numberBetween(10, 50),
                    ]);
                }
            }
        }
    }
}
