<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('tasks')->insert([
//            'task' => 'task nr 1',
//            'description' => 'description nr 1',
//        ]);
//        DB::table('tasks')->insert([
//            'task' => 'task nr 2',
//            'description' => 'description nr 2',
//        ]);

        Task::create([
            'task' => 'task nr 1',
            'description' => 'description nr 1',
        ]);

        Task::create([
            'task' => 'task nr 2',
            'description' => 'description nr 2',
        ]);
    }
}
