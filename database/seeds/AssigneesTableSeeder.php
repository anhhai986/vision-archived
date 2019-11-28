<?php

use Illuminate\Database\Seeder;

class AssigneesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Assignee::class, 100)->create();
    }
}