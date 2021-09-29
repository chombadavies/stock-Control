<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers=[
            [
                'supplierName'=>'Kaboch Suppliers',
                'supplierPin'=>'S0001',
                'supplierEmail'=>'kaboch@admin.com',
                'phoneNumber'=>'0728433788'
              
            ],
            [
                'supplierName'=>'meme Suppliers',
                'supplierPin'=>'S0002',
                'supplierEmail'=>'meme@admin.com',
                'phoneNumber'=>'0728478596'
                
            ],
            [
                'supplierName'=>'suncity Suppliers',
                'supplierPin'=>'S0003',
                'supplierEmail'=>'suncity@admin.com',
                'phoneNumber'=>'0721283788'
            ],
            [
                'supplierName'=>'test Suppliers',
                'supplierPin'=>'S0004',
                'supplierEmail'=>'test@admin.com',
                'phoneNumber'=>'0728437778'
            ],
            [
                'supplierName'=>'walofi Suppliers',
                'supplierPin'=>'S0005',
                'supplierEmail'=>'walofi@admin.com',
                'phoneNumber'=>'0789033788'
            ]
        ];

        foreach ($suppliers as $supplier){
            Supplier::create($supplier);
        }
    }

    
}
