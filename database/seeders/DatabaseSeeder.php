<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        //Category::factory(18)->create();
        Product::factory(40)->create();
        Tag::factory(15)->create();

        // $this->call(CategoriesTableSeeder::class);

    }
}
