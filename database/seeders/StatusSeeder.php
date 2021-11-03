<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_statuses')->insert([
            'name' => 'First status',
        ]);
        DB::table('transaction_statuses')->insert([
            'name' => 'Second status',
        ]);
    }
}
