<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $titles = ['laravel勉強', 'FP3級勉強', '旅行行きたい'];
      foreach($titles as $title){
        DB::table('tasks')->insert([
          'title' => $title,
          'status' => 1,
          'due_date' => Carbon::now()->addDay(1),
          'folder_id' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }
    }
}
