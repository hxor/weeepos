<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->truncate();
        $data = [
        	['customer_id' => '1', 'point_in' => '5', 'point_out' => '0', 'point_balance' => '5', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        	['customer_id' => '1', 'point_in' => '10', 'point_out' => '0', 'point_balance' => '15', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        	['customer_id' => '1', 'point_in' => '0', 'point_out' => '8', 'point_balance' => '7', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        	['customer_id' => '2', 'point_in' => '2', 'point_out' => '0', 'point_balance' => '2', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        ];
        DB::table('points')->insert($data);
    }
}
