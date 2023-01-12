<?php

namespace Database\Seeders;

use App\Models\MtCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
            $data = [
                [
                    'alias' => 'donat',
                    'title' => 'Donat'
                ],
                [
                    'alias' => 'burger',
                    'title' => 'Burger',
                ],
                [
                    'alias' => 'kebab',
                    'title' => 'Kebab',
                ]
            ];
    
            DB::table('mt_categories')->insert($data);

    }
}
