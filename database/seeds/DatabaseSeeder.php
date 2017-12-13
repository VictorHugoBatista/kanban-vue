<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProjectsTableSeeder::class,
            StatusTableSeeder::class,
            TasksTableSeeder::class,
        ]);
    }
}
