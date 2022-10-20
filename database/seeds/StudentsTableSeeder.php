<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('students')->insert([
          'name' => '田中たかし',
          'age' => '55',
          'sex' => 'M',
          'address' => '横浜'
      ]);

      DB::table('students')->insert([
          'name' => '渡辺麻',
          'age' => '25',
          'sex' => 'W',
          'address' => '鎌倉'
      ]);

      DB::table('students')->insert([
          'name' => '加藤孝夫',
          'age' => '39',
          'sex' => 'X',
          'address' => '藤沢'
      ]);

      DB::table('students')->insert([
          'name' => '佐藤孝',
          'age' => '65',
          'sex' => 'M',
          'address' => '千葉'
      ]);

      DB::table('students')->insert([
          'name' => '北見真希',
          'age' => '40',
          'sex' => 'W',
          'address' => '青森'
      ]);
    }
}
