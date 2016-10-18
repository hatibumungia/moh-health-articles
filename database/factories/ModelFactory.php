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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
	$title = $faker->realText(60);
	$slug = str_slug($title, '-');
    return [
    	'user_id'	=> $faker->numberBetween(1, 10),
        'title' => $title,
        'slug'	=>	$slug,
        'image_id' => $faker->numberBetween(1, 10)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    $name = $faker->word;
    $slug = str_slug($name, '-');
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'name' => $name,
        'slug' => $slug,
        'color' => $faker->hexcolor
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'url' => $faker->imageUrl(800, 600, 'people', true, $faker->numberBetween(1, 10)),
        'article_id' => $faker->numberBetween(1, 10),
        'section_id' => $faker->numberBetween(1, 20)
    ];
});

$factory->define(App\Section::class, function (Faker\Generator $faker) {
    $title = $faker->realText(30);
    $slug = str_slug($title, '-');
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'article_id' => $faker->numberBetween(1, 10),
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->realText(800, 2),
        'image_id' => $faker->numberBetween(1, 10)
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
    $title = $faker->realText(30);
    $slug = str_slug($title, '-');
    return [
        'user_id' => 1,
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->realText(800, 2),
        'url' => 'https://www.youtube.com/embed/XGSy3_Czz8k',
        'category_id' => 1
    ];
});
