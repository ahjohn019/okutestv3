<?php

use Illuminate\Database\Seeder;

class OrgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = new \App\Organization([
            'name' => 'Old Care Sdn Bhd',
            'addr' => 'Cheras',
            'region' => 'Kuala Lumpur',
            'phone_no' => '011-1234567', 
            'reg_date' => '16-5-2015' 
        ]);
        $organization->save();//
    }
}
