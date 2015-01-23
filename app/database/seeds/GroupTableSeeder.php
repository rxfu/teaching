<?php

class GroupTableSeeder extends Seeder {

	public function run() {

		DB::table( 'groups' )->truncate();

		Group::create( array(
				'name' => '超级管理员',
			) );
		Group::create( array(
				'name' => '数据录入员',
			) );
		Group::create( array(
				'name' => '数据审核员',
			) );
		Group::create( array(
				'name' => '数据查询员',
			) );
	}

}
