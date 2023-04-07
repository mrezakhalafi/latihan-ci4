<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OwnerSeed extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 100; $i++) {
            $data = [
                'id_hewan' => ($i + 3),
                'nama_owner' => $faker->name,
                'created_at'    => Time::createFromTimestamp($faker->unixTime())
            ];

            // Using Query Builder
            $this->db->table('owner')->insert($data);
        }
    }
}
