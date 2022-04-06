<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Lesson::class, function (Faker\Generator $faker) {
    $name = $faker->text(50);
    return [
        'title' => $name,
        'slug' => str_slug($name),
        'short_text' => $faker->paragraph(),
        'full_text' => $faker->text(1000),
        'position' => rand(1, 10),
        'free_lesson' => rand(0, 1),
        'published' => rand(0, 1),
    ];
});
