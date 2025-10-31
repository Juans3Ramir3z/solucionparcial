<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name'=>'Electronica','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Ropa','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Alimentos','created_at'=>now(),'updated_at'=>now()]
        ]);
    }
}
