<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("companies")->insert([
            'id'                    => 1,
            'company_name'          => '赤色会社',
            'street_address'        => '東京都',
            'representative_name'   => '林',
        ]);

        DB::table("companies")->insert([
            'id'                    => 2,
            'company_name'          => '青色会社',
            'street_address'        => '神奈川県',
            'representative_name'   => '宝',
        ]);
    }
}
