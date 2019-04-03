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
        DB::table('users')->insert([
        	'name'=>'Admin',
        	'username'=>'Mr.Admin',
        	'role_id'=>1,
        	'email'=>'admin@gmail.com',
			'password'=>bcrypt('123456')
		]);

		DB::table('users')->insert([
        	'name'=>'Author',
        	'username'=>'Mr.Author',
        	'role_id'=>2,
        	'email'=>'author@gmail.com',
			'password'=>bcrypt('123456')
		]);

        	
    }
}
