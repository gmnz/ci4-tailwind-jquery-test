<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {

        helper(['random']);

        for($i=0;$i<100;$i++)
        {
            $data = [
                'name' => generate_random_string(5),
                'email' => generate_random_string(3) . "@" . generate_random_string(3) . "." . generate_random_string(3),
                'password' => generate_random_string(8),
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
