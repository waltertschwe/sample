<?php

use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		
		## TODO: Force password change on initial Login
		DB::table('users')->insert([
			'firstname' => 'Walter',
			'lastname' => 'Schweitzer',
			'email' => 'wschweitzer@advicetrade.com',
			'password' => bcrypt('youknownothingwaltersnow'),
			'created_at' => new \DateTime(),
			'website_id' => 2,
			'is_admin' => 1,
		]);
		
		DB::table('users')->insert([
			'firstname' => 'Jeff',
			'lastname' => 'Kay',
			'email' => 'jeff@advicetrade.com',
			'password' => bcrypt('youknownothingjeffsnow'),
			'created_at' => new \DateTime(),
			'website_id' => 2,
			'is_admin' => 1,
		]);
		
		DB::table('users')->insert([
			'firstname' => 'Mike ',
			'lastname' => 'Paulenoff',
			'email' => 'mike@advicetrade.com',
			'password' => bcrypt('youknownothingmikesnow'),
			'created_at' => new \DateTime(),
			'website_id' => 2,
			'is_admin' => 1,
		]);
		
		DB::table('users')->insert([
			'firstname' => 'Lee',
			'lastname' => 'Davis',
			'email' => 'lee-davis@hotmail.com',
			'password' => bcrypt('youknownothingleesnow'),
			'created_at' => new \DateTime(),
			'website_id' => 2,
			'is_admin' => 1,
		]);
		
		DB::table('users')->insert([
			'firstname' => 'Thomas',
			'lastname' => 'Sweeney',
			'email' => 'thomasmsweeney@gmail.com',
			'password' => bcrypt('youknownothingthomassnow'),
			'created_at' => new \DateTime(),
			'website_id' => 2,
			'is_admin' => 1,
		]);
	}
}
