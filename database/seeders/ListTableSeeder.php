<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = ['content' => 'study'];
        DB::table('list')->insert($param);
        $param = ['content' => 'work'];
        DB::table('list')->insert($param);
    }
}
