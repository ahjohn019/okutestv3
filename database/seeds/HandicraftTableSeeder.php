<?php

use Illuminate\Database\Seeder;

class HandicraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $handicraft = new \App\Handicraft([
            
            'title' => 'Handy Basket',
            'description' => 'A very useful handy basket, suitable for making hampers and decoration.',
            'price' => 12.00    
        ]);
        $handicraft->save();
        $handicraft = new \App\Handicraft([
            
            'title' => 'Handy Basket',
            'description' => 'A very useful handy basket, suitable for making hampers and decoration.',
            'price' => 12.00    
        ]);
      
        $handicraft->save();
//
    }
}
