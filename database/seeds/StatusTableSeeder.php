<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Status::class)->create([
            'name' => 'To do',
        ]);
        factory(\App\Status::class)->create([
            'name' => 'Doing',
        ]);
        factory(\App\Status::class)->create([
            'name' => 'Done',
        ]);
    }
}
