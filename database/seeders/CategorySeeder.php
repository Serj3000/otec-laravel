<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            ['name'=>'Верхній одяг',
             'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['name'=>'Джинси',
             'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['name'=>'Брюки',
             'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['name'=>'Сорочки',
             'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
             ['name'=>'Блузки',
             'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
             ['name'=>'Світшоти',
             'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
        ];

        DB::table('categories')->insert($categories);
    }
}
