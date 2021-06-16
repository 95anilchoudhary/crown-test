<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         
            DB::table('categorys')->insert([
    
                [
                    'name' => 'Nikon',
                    'type' => 'Mirrorless',
                    'model' => '2018',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Canon',
                    'type' => 'point and shoot',
                    'model' => '2021',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
    
            ]);
        
    }
}
