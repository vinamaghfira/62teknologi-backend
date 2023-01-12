<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder
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
                'name' => 'Tommoro Restaurant', 
            ],
            [
                'name' => 'Double U Steak',
            ],
        ];

        DB::table('mt_transactions')->insert($data);
    }
}
