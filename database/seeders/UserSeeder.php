<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Super Admin',
			'email' => 'test@test.com',
			'password' => Hash::make('password'),
			'role_id' => 1,
			'created_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
		]);
	}
}
