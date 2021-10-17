<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Photo::truncate();
        Schema::enableForeignKeyConstraints();

        User::factory(100)->hasPhotos(9)->create();
    }
}
