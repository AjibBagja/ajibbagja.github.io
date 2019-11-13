<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Item;
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
$factory->define(Item::class, function (Faker $faker) {
    $kategori = config('config.kategori_item');
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
    $name = $faker->productName;
    return [
        'nama_item' => $name,
        'tipe_item' => 'akun',
        'harga_item' => $faker->randomNumber(6),
        'slug' => strtolower(str_replace(' ', '-',$name)),
        'id_user'=> (User::inRandomOrder()->first())->id_user,
        'status_item' => 'ready',
        'description' => $faker->paragraph,
        'detail_item'=>$faker->text,
        'stok_item' => $faker->randomNumber(2),
        'id_kategori' => mt_rand(1,count($kategori))
    ];
});
