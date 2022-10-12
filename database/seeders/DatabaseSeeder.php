<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Layanan;
use App\Models\SyaratSurat as ModelsSyaratSurat;
use SyaratSurat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
                'name' => 'Darlian Ramadhani',
                'username' => 'rembo',
                'email' => 'darlian@test.com',
                'password' => bcrypt('password'),
                'is_admin' => 1,
            ]);


    //     User::factory(3)->create();

    //     Category::factory(1)->create();
    //     Category::create([
    //         'name' => 'Berita Desa',
    //         'slug' => 'berita-desa'
    //     ]);

    //     Post::factory(20)->create();

    //    ModelsSyaratSurat::create([
    //         'name' => 'Surat Pengantar Rt/Rw',
    //    ]);

    }
}
