<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class HewanSeeder extends Seeder
{
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 100; $i++) {
            $data = [
                'nama_hewan' => $faker->name,
                'harga_hewan'    => rand(11111, 99999),
                'warna_hewan'   => 'Random',
                'created_at'    => Time::createFromTimestamp($faker->unixTime())
            ];

            // Using Query Builder
            $this->db->table('hewan')->insert($data);
        }
    }
}
