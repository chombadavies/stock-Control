<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitRecords =[
            ['unit'=>'kilograms'],
            ['unit'=>'pieces'],  
            ['unit'=>'grams'],
            ['unit'=>'mililitres'],
            ['unit'=>'litres'],  
            ['unit'=>'packets'],
            ['unit'=>'reams'],
            ['unit'=>'rolls'],
        ];
        foreach ( $unitRecords as $units){
           Unit::create($units); 
        }
    }
}
