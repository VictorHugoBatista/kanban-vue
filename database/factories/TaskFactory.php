<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'project_id' => rand(1, 5),
        'status_id' => rand(1, 3),
    ];
});
