<?php

class UserTableSeeder extends Seeder {

	public function run() {

		DB::table( 'users' )->truncate();

		$now = date( 'Y-m-d H:i:s' );

		User::create( array(
				'username' => 'admin',
				'email' => 'admin@test.com',
				'password' => Hash::make( 'admin888' ),
				'realname' => '超级管理员',
				'department_id' => 1,
				'activated' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			) );
		User::create( array(
				'username' => 'tester01',
				'email' => 'tester01@test.com',
				'password' => Hash::make( 'tester' ),
				'realname' => '评分审核员',
				'department_id' => 2,
				'activated' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			) );
		User::create( array(
				'username' => 'tester02',
				'email' => 'tester02@test.com',
				'password' => Hash::make( 'tester' ),
				'realname' => '教学秘书',
				'department_id' => 3,
				'activated' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			) );
		User::create( array(
				'username' => 'tester03',
				'email' => 'tester03@test.com',
				'password' => Hash::make( 'tester' ),
				'realname' => '学院领导',
				'department_id' => 4,
				'activated' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			) );
	}

}
