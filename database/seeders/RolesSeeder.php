<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('roles')->insert([
			'role' => 'superadmin',
			'created_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
		]);

		DB::table('roles')->insert([
			'role' => 'admin',
			'created_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
		]);

		DB::table('roles')->insert([
			'role' => 'user',
			'created_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now('Asia/Manila')->format('Y-m-d H:i:s'),
		]);
	}
}
