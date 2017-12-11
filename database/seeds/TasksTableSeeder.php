<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Task::class, 8)->create([
            'name' => str_random(10),
            'project_id' => 1,
            'status_id' => 1,
        ]);
        factory(\App\Task::class, 5)->create([
            'name' => str_random(10),
            'project_id' => 2,
            'status_id' => 2,
        ]);
        factory(\App\Task::class, 7)->create([
            'name' => str_random(10),
            'project_id' => 3,
            'status_id' => 3,
        ]);
    }
}
