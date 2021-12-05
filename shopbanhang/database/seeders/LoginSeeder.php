<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email' => 'hanh@gmail.com',
                'password' => bcrypt('hanh123'),
            ],
            [
                'email' => 'thanh@gmail.com',
                'password' => bcrypt('thanh123'),
            ],
            [
                'email' => 'cuong@gmail.com',
                'password' => bcrypt('cuong123'),
            ],
        ];
        DB::table('user')->insert($data);
    }
    
}
