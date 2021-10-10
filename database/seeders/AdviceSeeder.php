<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdviceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Advice::factory(10)->create();
    }
}
