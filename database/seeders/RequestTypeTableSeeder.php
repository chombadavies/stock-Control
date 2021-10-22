<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Seeder;

class RequestTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requestTypes=[
[
    'name'=>'Personal',
    'id'=>1
    
],
[
    'name'=>'Department',
    'id'=>2
    
],
[
    'name'=>'Office',
    'id'=>3
    
],
        ];
        foreach ($requestTypes as $requestType) {
            RequestType::create($requestType);
        }
    }
}
