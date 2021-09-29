<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            [
                'categoryName'=>'Environment','status'=>1,'code'=>'ENV'
            ],
            [
                'categoryName'=>'ICT','status'=>1,'code'=>'ICT'
            ],
            [
                'categoryName'=>'Kitchen','status'=>1,'code'=>'KTN'
            ],
            [
                'categoryName'=>'Staionary','status'=>1,'code'=>'STN'
            ],
            [
                'categoryName'=>'Cleaning','status'=>1,'code'=>'CLN'
            ],
            [
                'categoryName'=>'Health','status'=>1,'code'=>'HLT'
            ],
            [
                'categoryName'=>'electricals','status'=>1,'code'=>'ELC'
            ],
		];
  
        foreach ($categoryRecords as $key =>$record){
            \App\Models\Category::create($record);
        }
    }
}
