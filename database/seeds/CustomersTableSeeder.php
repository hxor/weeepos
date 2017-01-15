<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();
        $data = [
        	['code' => randint(), 'name' => 'Customer1', 'phone' => '08999', 'address' => 'Jl.XXX', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        	['code' => randint(), 'name' => 'Customer2', 'phone' => '08991', 'address' => 'Jl.XXX', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        	['code' => randint(), 'name' => 'Customer3', 'phone' => '08992', 'address' => 'Jl.XXX', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        ];
        DB::table('customers')->insert($data);
    }
}
