<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(User::class, function (Faker $faker) {
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
    $name = $faker->name;
    return [
        'nama' => $name,
        'email' => $faker->safeEmail,
        'slug' => strtolower(str_replace(' ', '-',$name)),
        'password' => Hash::make('test123'),
        'nomor_hp' => $faker->phoneNumber,
        'activated'=>true
    ];
});