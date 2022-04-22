<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1;$i<=10; $i++){
            $a = $faker->numberBetween(20000, 50000);
            $b = $a + 5000;
            DB::table('product')->insert([
                'foto_barang' => $faker->imageUrl($width = 640, $height = 480),
                'nama_barang' => $faker->unique()->name,
                'harga_beli' => $a,
                'harga_jual' => $b,
                'stok' => $faker->numberBetween(5, 100)
            ]);
        }
    }
}
