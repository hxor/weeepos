<?php

use Illuminate\Database\Seeder;

class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->truncate();
        $data = [
        	['reward' => 'Voucher Pulsa 5rb', 'point' => '50']
        ];
        DB::table('rewards')->insert($data);
    }
}
