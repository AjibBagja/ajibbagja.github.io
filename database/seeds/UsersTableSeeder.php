<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Item;
use App\KategoriItem;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = config('config.kategori_item');
        // User::create(array(
        //     'nama' => 'Test Seller',
        //     'email' => 'test1@test.com',
        //     'password' => Hash::make('test123'),
        //     'nomor_hp' => "08812381092",
        //     "activated" => true
        // ));
        User::create(array(
            'nama' => 'Test Buyer',
            'email' => 'test2@test.com',
            'password' => Hash::make('test123'),
            'nomor_hp' => "08812381093",
            'slug' => 'test-buyer',
            "activated" => true
        ));
        // User::create(array(
        //     'nama' => 'Test User 3',
        //     'email' => 'test3@test.com',
        //     'password' => Hash::make('test123'),
        //     'nomor_hp' => "08812381094",
        //     "activated" => true
        // ));
        foreach($kategori as $k){
            KategoriItem::create(array(
                'nama_kategori' => $k,
                'slug' => strtolower(str_replace(' ', '-',$k))
            ));
        }
        factory(App\User::class,50)->create();
        factory(App\Item::class,200)->create();
    }
}