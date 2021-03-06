<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(HandicraftTableSeeder::class);
         $this->call(AdminTableSeeder::class);
         $this->call(OrgTableSeeder::class);
    }
}
