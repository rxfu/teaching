<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call( 'UserTableSeeder' );
		$this->call( 'GroupTableSeeder' );
		$this->call( 'PermissionTableSeeder' );
		$this->call( 'UserGroupTableSeeder' );
		$this->call( 'GroupPermissionTableSeeder' );
		$this->call( 'DepartmentTableSeeder' );
		$this->call( 'SettingTableSeeder' );
		$this->call( 'SystemTableSeeder' );
		$this->call( 'CategoryTableSeeder' );
		$this->call( 'MarkTableSeeder' );
		$this->call( 'IndexTableSeeder' );
	}

}
