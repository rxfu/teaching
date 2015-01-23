<?php

class IndexTableSeeder extends Seeder {

	public function run() {

		DB::table( 'indexes' )->truncate();

		Index::create( array(
				'seq' => '2-1-1',
				'name' => '学院领导总人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 2,
				'category_id' => 1,
				'order' => 1,
			) );
		Index::create( array(
				'seq' => '2-1-2',
				'name' => '学院领导完成听课任务人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 1,
				'order' => 2,
			) );
		Index::create( array(
				'seq' => '2-2-1',
				'name' => '教研室主任总人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 2,
				'category_id' => 1,
				'order' => 3,
			) );
		Index::create( array(
				'seq' => '2-2-2',
				'name' => '教研室主任完成听课人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 1,
				'order' => 4,
			) );
		Index::create( array(
				'seq' => '4-1',
				'name' => '教研室总数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 2,
				'category_id' => 1,
				'order' => 5,
			) );
		Index::create( array(
				'seq' => '4-2',
				'name' => '教研室教研活动次数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 2,
				'category_id' => 1,
				'order' => 6,
			) );
		Index::create( array(
				'seq' => '9-1',
				'name' => '教学计划异动门数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 2,
				'category_id' => 2,
				'order' => 7,
			) );
		Index::create( array(
				'seq' => '9-2',
				'name' => '专业必修课（不含实验课）中教师应用多媒体上课的课时数（数学科学学院、体育学院、音乐学院、美术学院、设计学院不用填报）',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 8,
			) );
		Index::create( array(
				'seq' => '6-1',
				'name' => '主讲本科课程的教师人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 9,
			) );
		Index::create( array(
				'seq' => '6-2',
				'name' => '主讲教师中符合岗位资格的教师数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 10,
			) );
		Index::create( array(
				'seq' => '7-1',
				'name' => '在岗教授、副教授总人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 11,
			) );
		Index::create( array(
				'seq' => '7-1-（1）',
				'name' => '其中：教授总人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 12,
			) );
		Index::create( array(
				'seq' => '7-1-（2）',
				'name' => '副教授总人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 13,
			) );
		Index::create( array(
				'seq' => '7-2',
				'name' => '教授、副教授上课人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 14,
			) );
		Index::create( array(
				'seq' => '7-2-（1）',
				'name' => '教授上课人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 15,
			) );
		Index::create( array(
				'seq' => '7-2-（2）',
				'name' => '其中：55岁及以下的教授上课人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 16,
			) );
		Index::create( array(
				'seq' => '7-3-（1）',
				'name' => '副教授上课人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 17,
			) );
		Index::create( array(
				'seq' => '7-3-（2）',
				'name' => '其中：55岁及以下的副教授上课人数',
				'type' => 'text',
				'collection_department' => 'all',
				'mark_department' => 1,
				'category_id' => 2,
				'order' => 18,
			) );
	}

}
