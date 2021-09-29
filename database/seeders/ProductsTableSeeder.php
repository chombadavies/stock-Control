<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            [
                'name'=>'Sugar',
                'code'=>'P0001',
                'category_id'=>3
            ],
            [
                'name'=>'Salt',
                'code'=>'P0002',
                'category_id'=>3
            ],
            [
                'name'=>'beverage',
                'code'=>'P0003',
                'category_id'=>3
            ],
            [
                'name'=>'Keyboard',
                'code'=>'P0004',
                'category_id'=>2
            ],
            [
                'name'=>'Mouse',
                'code'=>'P0005',
                'category_id'=>2
            ],
            [
                'name'=>'VDI',
                'code'=>'P0006',
                'category_id'=>2
            ],
            [
                'name'=>'Power Socket',
                'code'=>'P0007',
                'category_id'=>7
            ],
            [
                'name'=>'Bulbs',
                'code'=>'P0008',
                'category_id'=>7
            ],
            [
                'name'=>'Extension Cable',
                'code'=>'P0009',
                'category_id'=>7
            ],
            [
                'name'=>'Detergent',
                'code'=>'P0010',
                'category_id'=>5
            ],
            [
                'name'=>'enevelopes',
                'code'=>'P0011',
                'category_id'=>4
            ],
            [
                'name'=>'pens',
                'code'=>'P0012',
                'category_id'=>2
            ],
            [
                'name'=>'printers',
                'code'=>'P0013',
                'category_id'=>4
            ],
            [
                'name'=>'tonner',
                'code'=>'P0014',
                'category_id'=>4
            ],
            [
                'name'=>'toilet paper',
                'code'=>'P0015',
                'category_id'=>8
            ],
            [
                'name'=>'Air freshner',
                'code'=>'P0016',
                'category_id'=>8
            ],
            [
                'name'=>'Dish Washing Pads',
                'code'=>'P0017',
                'category_id'=>3
            ],
            [
                'name'=>'Tublers',
                'code'=>'P0018',
                'category_id'=>3
            ],
            [
                'name'=>'Printing Papers',
                'code'=>'P0019',
                'category_id'=>4
            ],
            [
                'name'=>'serviettes  ',
                'code'=>'P0020',
                'category_id'=>3
            ],
            [
                'name'=>'flourescent tubes',
                'code'=>'P0021',
                'category_id'=>7
            ],
            [
                'name'=>'Blood Sugar Strips',
                'code'=>'P0022',
                'category_id'=>6
            ],
            [
                'name'=>'medicine tablets',
                'code'=>'P0023',
                'category_id'=>6
            ],
            [
                'name'=>'Deep Heat Rub',
                'code'=>'P0024',
                'category_id'=>6
            ],
            [
                'name'=>'Surgical spirit',
                'code'=>'P0025',
                'category_id'=>6
            ],
            [
                'name'=>'Elastoplast',
                'code'=>'P0026',
                'category_id'=>6
            ],
            [
                'name'=>'antiseptic liquid',
                'code'=>'P0027',
                'category_id'=>6
            ],
            [
                'name'=>'Gloves ',
                'code'=>'P0028',
                'category_id'=>6
            ],
            [
                'name'=>'Ventoline',
                'code'=>'P0029',
                'category_id'=>6
            ],
            [
                'name'=>' Cotton wool',
                'code'=>'P0030',
                'category_id'=>6
            ],
            [
                'name'=>'first aid scissors',
                'code'=>'P0031',
                'category_id'=>6
            ],
            [
                'name'=>'Battery chargers',
                'code'=>'P0032',
                'category_id'=>7
            ],
            [
                'name'=>'rechargerble batteries',
                'code'=>'P0033',
                'category_id'=>7
            ],
            [
                'name'=>'power surge protector',
                'code'=>'P0034',
                'category_id'=>7
            ],
            [
                'name'=>'thermometer',
                'code'=>'P0035',
                'category_id'=>6
            ],
            [
                'name'=>'padlocks ',
                'code'=>'P0036',
                'category_id'=>9
            ],
            [
                'name'=>'Onion Pappers ',
                'code'=>'P0037',
                'category_id'=>3
            ],
            [
                'name'=>'BINDING SHEETS  ',
                'code'=>'P0038',
                'category_id'=>4
            ],
            [
                'name'=>'TEA SIEVES',
                'code'=>'P0039',
                'category_id'=>3
            ],
            [
                'name'=>'Glue ',
                'code'=>'P0040',
                'category_id'=>4
            ],
            [
                'name'=>'waste paper basket  ',
                'code'=>'P0041',
                'category_id'=>9
            ],
            [
                'name'=>' files',
                'code'=>'P0042',
                'category_id'=>4
            ],
            [
                'name'=>'Stamps ',
                'code'=>'P0043',
                'category_id'=>9
            ],
            [
                'name'=>'Stamp ink ',
                'code'=>'P0044',
                'category_id'=>4
            ],
            [
                'name'=>'Tapes ',
                'code'=>'P0045',
                'category_id'=>4
            ],
            [
                'name'=>' Flash disk',
                'code'=>'P0046',
                'category_id'=>2
            ],
            [
                'name'=>'stapler ',
                'code'=>'P0047',
                'category_id'=>9
            ],
            [
                'name'=>'  staples remover',
                'code'=>'P0048',
                'category_id'=>9
            ],
            [
                'name'=>'Counter Book ',
                'code'=>'P0049',
                'category_id'=>4
            ],
            [
                'name'=>'  shorthand notebooks ',
                'code'=>'P0050',
                'category_id'=>4
            ],
        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
