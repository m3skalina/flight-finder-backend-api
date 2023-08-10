<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'code_departure' => 'LAX',
                'code_arrival' => 'FCO',
                'price' => 1200.00,
            ],
            [
                'code_departure' => 'LAX',
                'code_arrival' => 'FCO',
                'price' => 1389.00,
            ],
            [
                'code_departure' => 'LAX',
                'code_arrival' => 'MXP',
                'price' => 1450.00,
            ],
            [
                'code_departure' => 'LAX',
                'code_arrival' => 'MXP',
                'price' => 1490.00,
            ],
            [
                'code_departure' => 'LAX',
                'code_arrival' => 'LIN',
                'price' => 999.00,
            ],
            [
                'code_departure' => 'LAX',
                'code_arrival' => 'LIN',
                'price' => 799.00,
            ],
            [
                'code_departure' => 'LIN',
                'code_arrival' => 'FCO',
                'price' => 125.00,
            ],
            [
                'code_departure' => 'LIN',
                'code_arrival' => 'FCO',
                'price' => 65.00,
            ],
            [
                'code_departure' => 'LIN',
                'code_arrival' => 'CIA',
                'price' => 145.00,
            ],
            [
                'code_departure' => 'LIN',
                'code_arrival' => 'MXP',
                'price' => 100.00,
            ],
        ]);
    }
}
