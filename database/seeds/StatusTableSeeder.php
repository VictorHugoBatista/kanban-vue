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
        collect(config('seed.statuses'))->each(function ($name) {
            App\Status::firstOrCreate(['name' => $name]);
        });
    }
}
