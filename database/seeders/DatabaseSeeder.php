<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name'=>'Duong Viet',
        //     'email'=>'duongviet@gmail.com',
        //     'password'=>Hash::make('password'),
        //     'user_catalogues_id'=>1
        // ]);

        // AttributeValue::create([
        //     'attribute_id'=>1,
        //     'attribute_value'=>"S",
        // ]);
        // AttributeValue::create([
        //     'attribute_id'=>1,
        //     'attribute_value'=>"M",
        // ]);
        // AttributeValue::create([
        //     'attribute_id'=>1,
        //     'attribute_value'=>"L",
        // ]);
        // AttributeValue::create([
        //     'attribute_id'=>1,
        //     'attribute_value'=>"XL",
        // ]);
        // AttributeValue::create([
        //     'attribute_id'=>2,
        //     'attribute_value'=>"Xanh",
        // ]);
        // AttributeValue::create([
        //     'attribute_id'=>2,
        //     'attribute_value'=>"Đỏ",
        // ]);
        // AttributeValue::create([
        //     'attribute_id'=>2,
        //     'attribute_value'=>"Vàng",
        // ]);

        AttributeValue::create([
            'attribute_id'=>2,
            'attribute_value'=>"Đen",
        ]);
        AttributeValue::create([
            'attribute_id'=>2,
            'attribute_value'=>"Trắng",
        ]);
        
    }
}
