<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Category;
        $item->id = 1;
        $item->name = 'Apple';
        $item->code = 'AP';
        $item->save();

        $item = new Category;
        $item->id = 2;
        $item->name = 'Sam Sung';
        $item->code = 'SS';
        $item->save();

        $item = new Category;
        $item->id = 3;
        $item->name = 'Oppo';
        $item->code = 'OPP';
        $item->save();

        $item = new Category;
        $item->id = 4;
        $item->name = 'Vivo';
        $item->code = 'VV';
        $item->save();

        $item = new Category;
        $item->id = 5;
        $item->name = 'Nokia';
        $item->code = 'NK';
        $item->save();

        $item = new Category;
        $item->id = 6;
        $item->name = 'Xiaomi';
        $item->code = 'XMI';
        $item->save();
    }
}
