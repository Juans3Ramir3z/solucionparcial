<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['category_id'=>1,'name'=>'Parlante JBL','price'=>1200000,'quantity'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'name'=>'Camiseta boman','price'=>110000,'quantity'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>3,'name'=>'Manzana','price'=>2500,'quantity'=>6,'created_at'=>now(),'updated_at'=>now()]
        ]);
    }
}
