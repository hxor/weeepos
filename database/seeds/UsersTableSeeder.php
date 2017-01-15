<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $data = [
        	['name' => 'Administrator', 'email' => 'admin@admin.com', 'password' => bcrypt('password'), 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        ];
        DB::table('users')->insert($data);
    }
}
