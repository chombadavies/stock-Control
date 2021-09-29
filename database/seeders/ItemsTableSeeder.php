<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
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
                'name'=>'LOCAL Sugar',
                'code'=>'I0001',
                'category_id'=>3,
                'product_id'=>1,
                'itemUnit'=>'kilogram'

            ],
            [
                'name'=>'sachets sugar',
                'code'=>'I0002',
                'category_id'=>3,
                'product_id'=>1,
                'itemUnit'=>'pieces'

            ],
            [
                'name'=>'table salt',
                'code'=>'I0003',
                'category_id'=>3,
                'product_id'=>2,
                'itemUnit'=>'kilogram'
            ],
            [
                'name'=>'sea salt',
                'code'=>'I0004',
                'category_id'=>3,
                'product_id'=>2,
                'itemUnit'=>'kilogram'
            ],
            [
                'name'=>'Drinking Chocoloate',
                'code'=>'I0005',
                'category_id'=>3,
                'product_id'=>3,
                'itemUnit'=>'kilogram'
            ],
            [
                'name'=>'tea bags',
                'code'=>'I0006',
                'category_id'=>3,
                'product_id'=>3,
                'itemUnit'=>'kilogram'
            ],
            [
                'name'=>'milo',
                'code'=>'I0007',
                'category_id'=>3,
                'product_id'=>3,
                'itemUnit'=>'kilogram'
            ],
            [
                'name'=>'wireless Keyboard',
                'code'=>'I0008',
                'category_id'=>2,
                'product_id'=>4,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Usb Keyboard',
                'code'=>'I0009',
                'category_id'=>2,
                'product_id'=>4,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'QWERTY  Keyboard',
                'code'=>'I0010',
                'category_id'=>2,
                'product_id'=>4,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'wireless Mouse',
                'code'=>'I0011',
                'category_id'=>2,
                'product_id'=>5,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'usb Mouse',
                'code'=>'I0012',
                'category_id'=>2,
                'product_id'=>5,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'VDI',
                'code'=>'I0013',
                'category_id'=>2,
                'product_id'=>6,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'double Power Socket',
                'code'=>'I0014',
                'category_id'=>7,
                'product_id'=>7,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'single Power Socket',
                'code'=>'I0015',
                'category_id'=>7,
                'product_id'=>7,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Energy Saving Bulbs LED',
                'code'=>'I0016',
                'category_id'=>7,
                'product_id'=>8,
                'itemUnit'=>'pieces'

            ],
            [
                'name'=>'Extension Cable',
                'code'=>'I0017',
                'category_id'=>7,
                'product_id'=>9,
                'itemUnit'=>'pieces'

            ],
            [
                'name'=>'Dish Washing Paste',
                'code'=>'I0018',
                'category_id'=>5,
                'product_id'=>10,
                'itemUnit'=>'grams'
            ],
            [
                'name'=>'Household bleaches',
                'code'=>'I0019',
                'category_id'=>5,
                'product_id'=>10,
                'itemUnit'=>'litres'
            ],
            [
                'name'=>'Bar Soap ',
                'code'=>'I0020',
                'category_id'=>5,
                'product_id'=>10,
                'itemUnit'=>'kilograms'
            ],
            [
                'name'=>'Powder Soap',
                'code'=>'I0021',
                'category_id'=>5,
                'product_id'=>10,
                'itemUnit'=>'kilograms'
            ],
            [
                'name'=>'Envelopes A4 Peel and Seal Printed Clean  “Republic of Kenya”',
                'code'=>'I0022',
                'category_id'=>4,
                'product_id'=>11,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Envelopes A5 Peel and Seal Printed Clean  “Republic of Kenya”',
                'code'=>'I0023',
                'category_id'=>4,
                'product_id'=>11,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Envelopes A3 Peel and Seal Printed Clean  “Republic of Kenya”',
                'code'=>'I0024',
                'category_id'=>4,
                'product_id'=>11,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Biro Pens  (25s)',
                'code'=>'I0025',
                'category_id'=>2,
                'product_id'=>12,
                'itemUnit'=>'packets'
            ],
            [
                'name'=>'kyocera printers',
                'code'=>'I0026',
                'category_id'=>4,
                'product_id'=>13,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'kyocera tonner',
                'code'=>'I0027',
                'category_id'=>4,
                'product_id'=>14,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Smooth, White and Dustless 40s',
                'code'=>'I0028',
                'category_id'=>8,
                'product_id'=>15,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Air Freshener',
                'code'=>'I0029',
                'category_id'=>8,
                'product_id'=>16,
                'itemUnit'=>'mililitres'
            ],
            [
                'name'=>'Dish Washing  Pads (4s) (Double sided)',
                'code'=>'I0030',
                'category_id'=>3,
                'product_id'=>17,
                'itemUnit'=>'packets'
            ],
            [
                'name'=>'Disposable Glasses  250ml',
                'code'=>'P0031',
                'category_id'=>3,
                'product_id'=>18,
                'itemUnit'=>'catton'
            ],
            [
                'name'=>' A4 80gms- Smooth, Brilliant  White',
                'code'=>'P0032',
                'category_id'=>4,
                'product_id'=>19,
                'itemUnit'=>'ream'
                
            ],
            [
                'name'=>'Serviette 100s Large Size, Dustless White  ',
                'code'=>'I0033',
                'category_id'=>3,
                'product_id'=>20,
                'itemUnit'=>'packet'
            ],
            [
                'name'=>'Fluorescent Tubes 2Feet LED ',
                'code'=>'I0034',
                'category_id'=>7,
                'product_id'=>21,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Fluorescent Tubes 4Feet LED',
                'code'=>'I0035',
                'category_id'=>7,
                'product_id'=>21,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Fluorescent Tube 5Ft LED',
                'code'=>'I0036',
                'category_id'=>7,
                'product_id'=>21,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Blood Sugar Strips',
                'code'=>'I0037',
                'category_id'=>6,
                'product_id'=>22,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Panadol Extra Tabs 100s',
                'code'=>'P0038',
                'category_id'=>6,
                'product_id'=>23,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Hedex Tabs 100s',
                'code'=>'I0039',
                'category_id'=>6,
                'product_id'=>23,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Deep Heat Rub',
                'code'=>'I0040',
                'category_id'=>6,
                'product_id'=>24,
                'itemUnit'=>'grams'
            ],
            [
                'name'=>'Surgical spirit',
                'code'=>'I0041',
                'category_id'=>6,
                'product_id'=>25,
                'itemUnit'=>'litres'
            ],
            [
                'name'=>'Elastoplast Assorted 100s',
                'code'=>'I0042',
                'category_id'=>6,
                'product_id'=>26,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Betadine Antiseptic Solution ',
                'code'=>'I0043',
                'category_id'=>6,
                'product_id'=>27,
                'itemUnit'=>'litres'
            ],
            [
                'name'=>'Antiseptic Liquid 500ml bottle(Dettol) ',
                'code'=>'I0044',
                'category_id'=>6,
                'product_id'=>27,
                'itemUnit'=>'litres'
            ],
            [
                'name'=>'Sterile Gloves 7.5" ',
                'code'=>'I0045',
                'category_id'=>6,
                'product_id'=>28,
                'itemUnit'=>'litres'
            ],
            [
                'name'=>'Ventoline 100g Evohaler 200D 1pkt',
                'code'=>'I0046',
                'category_id'=>6,
                'product_id'=>29,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>' Cotton Wool 400g roll',
                'code'=>'I0047',
                'category_id'=>6,
                'product_id'=>30,
                'itemUnit'=>'grams'
            ],
            [
                'name'=>'first aid scissors',
                'code'=>'I0048',
                'category_id'=>6,
                'product_id'=>31,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Battery chargers',
                'code'=>'I0049',
                'category_id'=>7,
                'product_id'=>32,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Rechargeable Batteries AAA/AA',
                'code'=>'I0050',
                'category_id'=>7,
                'product_id'=>33,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'power surge protector',
                'code'=>'I0051',
                'category_id'=>7,
                'product_id'=>34,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Infrared Thermometers (Rechargeable)',
                'code'=>'I0052',
                'category_id'=>6,
                'product_id'=>35,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Padlocks High Security size 3/4 ',
                'code'=>'I0053',
                'category_id'=>9,
                'product_id'=>36,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Onion Skin paper; Blue 100gsm ',
                'code'=>'I0054',
                'category_id'=>3,
                'product_id'=>37,
                'itemUnit'=>'ream'
            ],
            [
                'name'=>'Onion Skin paper; Vellum 100gsm',
                'code'=>'I0055',
                'category_id'=>3,
                'product_id'=>37,
                'itemUnit'=>'ream'
            ],
            [
                'name'=>'Binding sheets/Embossed Paper',
                'code'=>'I0056',
                'category_id'=>4,
                'product_id'=>38,
                'itemUnit'=>'ream'
            ],
            [
                'name'=>'transparent binders',
                'code'=>'I0057',
                'category_id'=>4,
                'product_id'=>38,
                'itemUnit'=>'ream'
            ],
            [
                'name'=>'Tea Sieve Stainless Steel Large',
                'code'=>'I0058',
                'category_id'=>3,
                'product_id'=>39,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Office Glue 160gms ',
                'code'=>'I0060',
                'category_id'=>4,
                'product_id'=>40,
                'itemUnit'=>'grams'
            ],
            [
                'name'=>'Glue Stick 43g ',
                'code'=>'I0061',
                'category_id'=>4,
                'product_id'=>40,
                'itemUnit'=>'pieces'
            ],
           
            [
                'name'=>'waste paper basket  ',
                'code'=>'I0062',
                'category_id'=>9,
                'product_id'=>41,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Box Files A4 PVC',
                'code'=>'I0063',
                'category_id'=>4,
                'product_id'=>42,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Spring Files  A4 PVC',
                'code'=>'I0064',
                'category_id'=>4,
                'product_id'=>42,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>' Transparent Folders A4',
                'code'=>'I0065',
                'category_id'=>4,
                'product_id'=>42,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Self-Inking Stamps',
                'code'=>'I0066',
                'category_id'=>9,
                'product_id'=>43,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Stamp Pad Ink (Blue/Red/Purple)',
                'code'=>'I0067',
                'category_id'=>4,
                'product_id'=>44,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Packaging/ Brown Tape ¾ Inches *48M ',
                'code'=>'I0068',
                'category_id'=>4,
                'product_id'=>45,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Masking Tape ¾ Inches *48M ',
                'code'=>'I0069',
                'category_id'=>4,
                'product_id'=>45,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Cello Tapes ¾ Inches *48M ',
                'code'=>'I0070',
                'category_id'=>4,
                'product_id'=>45,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Flash Disk 32GB',
                'code'=>'I0071',
                'category_id'=>2,
                'product_id'=>46,
                'itemUnit'=>'pieces'

            ],
            [
                'name'=>'Stapler Heavy Duty ',
                'code'=>'I0072',
                'category_id'=>9,
                'product_id'=>47,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'  staples remover Heavy Duty',
                'code'=>'I0073',
                'category_id'=>9,
                'product_id'=>48,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Counter Books 4Q',
                'code'=>'I0074',
                'category_id'=>4,
                'product_id'=>49,
                'itemUnit'=>'pieces'
            ],
            [
                'name'=>'Shorthand Notebooks A580 pages',
                'code'=>'I0075',
                'category_id'=>4,
                'product_id'=>50,
                'itemUnit'=>'pieces'
            ],
        ];

        foreach ($products as $product){
            Item::create($product);
        }
    }
}
