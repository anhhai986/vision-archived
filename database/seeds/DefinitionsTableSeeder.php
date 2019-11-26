<?php

use Illuminate\Database\Seeder;

class DefinitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Definition::class, 30)->create();
    }
}
