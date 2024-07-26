<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create([
            "attribute_name"=>"Màu săc"
        ]);
        Attribute::create([
            "attribute_name"=>"Kích thước"
        ]);
    }
}
