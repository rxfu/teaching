<?php

class SettingTableSeeder extends Seeder {

	public function run() {

		DB::table( 'settings' )->truncate();

		$now = date( 'Y-m-d H:i:s' );

		Setting::create( array(
				'year' => '2014',
				'opened' => 1,
				'collected' => 1,
				'marked' => 1,
				'created_at' => $now,
				'updated_at' => $now,
			) );
	}

}
