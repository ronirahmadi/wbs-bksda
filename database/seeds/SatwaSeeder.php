<?php

use Illuminate\Database\Seeder;

class SatwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satwas')->insert([
        	'nama' => 'Anoa Gunung',
            'gambar' => 'anoagunung.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Rusa Timor',
            'gambar' => 'rusatimor.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Macan Tutul Jawa',
            'gambar' => 'macantutuljawa.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Harimau Sumatera',
            'gambar' => 'harimausumatera.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Badak Jawa',
            'gambar' => 'badakjawa.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Elang Jawa',
            'gambar' => 'elangjawa.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Komodo',
            'gambar' => 'komodo.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Burung Cendrawasih',
            'gambar' => 'burungcendrawasih.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Orang utan',
            'gambar' => 'orangutan.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Beruang Madu',
            'gambar' => 'beruangmadu.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Pesut Mahakam',
            'gambar' => 'pesutmahakam.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Kucing Hutan',
            'gambar' => 'kucinghutan.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Bekantan',
            'gambar' => 'bekantan.jpg',
        ]);

        DB::table('satwas')->insert([
        	'nama' => 'Rusa Bawean',
            'gambar' => 'rusabawean.jpg',
        ]);
    }
}
