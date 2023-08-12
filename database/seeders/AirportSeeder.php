<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airports')->insert(
            [
                [
                    'code' => 'LAX',
                    'name' => 'Los Angeles',
                    'lat' => 0,
                    'long' => 0,
                ],
                [
                    'code' => 'FCO',
                    'name' => 'Fiumicino - Rome',
                    'lat' => 0,
                    'long' => 0,
                ],
                [
                    'code' => 'CIA',
                    'name' => 'Ciampino - Rome',
                    'lat' => 0,
                    'long' => 0,
                ],
                [
                    'code' => 'LIN',
                    'name' => 'Linate - Milano',
                    'lat' => 0,
                    'long' => 0,
                ],
                [
                    'code' => 'MXP',
                    'name' => 'Malpensa - Milano',
                    'lat' => 0,
                    'long' => 0,
                ],
                [
                    'code' => 'AMS',
                    'name' => 'Schiphol Amsterdam Airport',
                    'lat' => 0,
                    'long' => 0,
                ],
            ]
        );
    }
}
