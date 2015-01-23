<?php

class SystemTableSeeder extends Seeder {

	public function run() {

		DB::table( 'systems' )->truncate();

		$now = date( 'Y-m-d H:i:s' );

		System::create( array(
				'website_name' => '广西师范大学本科教学工作状态数据管理系统',
				'introduction' => '系统推荐使用Firefox、Google Chrome、IE8.0及以上浏览器<br>
（1）指标录入：点击左边“指标录入”菜单选择一级指标，在文本框中填写填报内容，失去焦点自动提交内容；<br>
（2）指标审核：点击左边“指标审核”菜单选择一级指标，已经审核过内容，点击“是否审核”复选框，“√”为已审核，空为未审核；内容审核通过，点击“是否通过”复选框，“√”为已通过，空为未通过；<br>
（3）查看数据统计表：点击左边“指标统计”菜单选择相应学年度统计表；<br>
（4）修改密码：点击左边“用户管理”菜单选择修改密码，填写旧密码、新密码、确认密码并提交。<br>
',
				'created_at' => $now,
				'updated_at' => $now,
			) );
	}

}
