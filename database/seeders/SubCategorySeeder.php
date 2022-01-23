<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_categories=[
            ['cat_id'=>'1',
             'name'=>'Куртки',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'1',
             'name'=>'Пальто',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'1',
             'name'=>'Жилети',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'1',
             'name'=>'Джинсові куртки',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'2',
             'name'=>'Skiny',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'2',
             'name'=>'Mom',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'2',
             'name'=>'Джинси кльош',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")],
            ['cat_id'=>'2',
             'name'=>'Прямого крою',
            //  'slug'=>'',
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s")]
        ];

        DB::table('sub_categories')->insert($sub_categories);
    }
}
