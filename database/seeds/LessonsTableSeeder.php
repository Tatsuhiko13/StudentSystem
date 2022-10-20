<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('lessons')->insert([
          'student_id' => '1',
          'status' => '2ヶ月目',
          'le_name' => 'php',
          'tsk_per' => '10',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);

      DB::table('lessons')->insert([
        'student_id' => '2',
        'status' => '1ヶ月目',
        'le_name' => 'html',
        'tsk_per' => '15',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('lessons')->insert([
        'student_id' => '3',
        'status' => '3ヶ月目',
        'le_name' => 'laravel',
        'tsk_per' => '50',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('lessons')->insert([
        'student_id' => '4',
        'status' => 'OVER',
        'le_name' => 'laravel',
        'tsk_per' => '65',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      DB::table('lessons')->insert([
        'student_id' => '5',
        'status' => 'COMPLETE',
        'le_name' => 'laravel',
        'tsk_per' => '100',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
