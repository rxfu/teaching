<?php

class CategoryTableSeeder extends Seeder {

	public function run() {

		DB::table( 'categories' )->truncate();

		Category::create( array(
				'seq' => '一',
				'name' => '组织领导',
				'order' => 1,
			) );
		Category::create( array(
				'seq' => '二',
				'name' => '教学运行',
				'order' => 2,
			) );
		Category::create( array(
				'seq' => '三',
				'name' => '教学建设',
				'order' => 3,
			) );
		Category::create( array(
				'seq' => '四',
				'name' => '教学质量',
				'order' => 4,
			) );
	}

}
