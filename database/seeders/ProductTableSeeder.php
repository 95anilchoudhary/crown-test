<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'name' => 'Nikon D850',
                'category_id' => 1,
                'description' => '2018',
                'price'       =>  100,
                'make'        => 2018,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Canon D9870',
                'category_id' => 2,
                'description' => '2018',
                'price'       =>  100,
                'make'        => 2018,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
