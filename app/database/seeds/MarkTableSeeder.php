<?php

class MarkTableSeeder extends Seeder {

	public function run() {

		DB::table( 'marks' )->truncate();

		Mark::create( array(
				'seq' => '1',
				'name' => '领导听课情况',
				'score' => 2,
				'department_id' => 1,
				'order' => 1,
				'description' => '1.领导干部完成听课数量且质量评价表填写规范，计2分。<br />
2。为完成1人次扣0.1分，未听课1人次扣0.2分，扣完2分为止。<br />
3。听课质量评价表填写不规范，1次扣0.1分。',
			) );
		Mark::create( array(
				'seq' => '2',
				'name' => '教研活动次数',
				'score' => 2,
				'department_id' => 2,
				'order' => 2,
				'description' => '1.活动次数X〉=16次，计2分。<br />
2.12《=X〈16，计1.5分。<br />
3.8〈=X〈12，计1分。<br />
4.4〈=X〈8，计0.5分。<br />
5。X〈4，计0分。',
			) );
		Mark::create( array(
				'seq' => '3',
				'name' => '教学计划异动',
				'score' => 5,
				'department_id' => 2,
				'order' => 3,
			) );
		Mark::create( array(
				'seq' => '4',
				'name' => '主讲教师符合岗位资格比例',
				'score' => 2,
				'department_id' => 1,
				'order' => 4,
			) );
		Mark::create( array(
				'seq' => '5',
				'name' => '教授上本科生课比例',
				'score' => 5,
				'department_id' => 1,
				'order' => 5,
			) );
	}

}
