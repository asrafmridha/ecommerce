<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'image'=>'product.png',
            'product_name'=>'Apple Watch Series 5',
            'product_price'=>'350',
            'short_description'=>'GPS, Always-On Retina display, 30% larger screen, Swimproof, ECG app, Electrical and optical heart sensors, Built-in compass, Elevation, Emergency SOS, Fall Detection, S5 SiP with up to 2x faster 64-bit dual-core processor, watchOS 6 with Activity trends, cycle tracking, hearing health innovations, and the App Store on your wrist',




        ]);
    }
}
