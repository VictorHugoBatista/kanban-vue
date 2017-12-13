<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'project_id' => App\Project::all()->random()->id,
        'status_id' => App\Status::all()->random()->id,
    ];
});
