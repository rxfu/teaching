<?php

class DepartmentTableSeeder extends Seeder {

	public function run() {

		DB::table( 'departments' )->truncate();

		Department::create( array(
				'name' => '教务处教务科',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处高教室',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处教材科',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处应用办',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处实践办',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处评建办',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处考务科',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '教务处学籍科',
				'marker' => 1,
			) );
		Department::create( array(
				'name' => '电子工程学院',
				'collector' => 1,
			) );
		Department::create( array(
				'name' => '文学院',
				'collector' => 1,
			) );
		Department::create( array(
				'name' => '体育学院',
				'collector' => 1,
			) );
		Department::create( array(
				'name' => '计算机科学与信息工程学院',
				'collector' => 1,
			) );
		Department::create( array(
				'name' => '外国语学院',
				'collector' => 1,
			) );
		Department::create( array(
				'name' => '数学科学学院',
				'collector' => 1,
			) );
		Department::create( array(
				'name' => '设计学院',
				'collector' => 1,
			) );
	}

}
