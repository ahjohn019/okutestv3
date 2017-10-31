<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = new \App\Admin([
            'name' => 'ChangYuen',
            'email' => 'admin1@eoku.com',
            'role' => 'admin',
            'password' => bcrypt('changyuen'), 
        ]);
        $admins ->save();////

        $admins = new \App\Admin([
            'name' => 'WonJien',
            'email' => 'admin2@eoku.com',
            'role' => 'admin',
            'password' => bcrypt('wonjien'), 
        ]);
        $admins ->save();////

        $admins = new \App\Admin([
            'name' => 'Kopi Tou',
            'email' => 'admin3@eoku.com',
            'role' => 'admin',
            'password' => bcrypt('kopitou'), 
        ]);
        $admins ->save();////

        $admins = new \App\Admin([
            'name' => 'Paul Tan',
            'email' => 'admin4@eoku.com',
            'role' => 'admin',
            'password' => bcrypt('123456'), 
        ]);
        $admins ->save();////

        $admins = new \App\Admin([
            'name' => 'John Huang',
            'email' => 'staff1@eoku.com',
            'role' => 'staff',
            'password' => bcrypt('123321'), 
        ]);
        $admins ->save();////
    }
}
