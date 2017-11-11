<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'dob' => $faker->date(),
        'gender' => $faker->word,
        'role' => $faker->word,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Section::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
    ];
});

$factory->define(App\Thread::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
        'section_id' => function() {
            return factory('App\Section')->create()->id;
        },
        'name' => $faker->sentence,
        'content' => $faker->paragraph,
        'open' => true,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'thread_id' => $faker->randomNumber(),
        'user_id' => $faker->randomNumber(),
        'content' => $faker->paragraph,
    ];
});