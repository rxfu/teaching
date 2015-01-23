<?php

class SystemController extends AdminController {

	public function getDashboard() {

		$title = '概况';
		$system = System::find( 1 );

		$setting = Setting::find( 1 );
		if ($setting->opened) {

			$status = '系统处于<strong class="text-success">开放</strong>状态，可以查询统计数据';
			if ($setting->collected) {

				$status .= '，可以填报<strong class="text-danger">' . ($setting->year - 1) . '~' . $setting->year . '</strong>学年度指标数据';
			} else {

				$status .= '，不可填报';
			}

			if ($setting->marked) {

				$status .= '，可以审核<strong class="text-danger">' . ($setting->year - 1) . '~' . $setting->year . '</strong>学年度指标数据';
			} else {

				$status .= '，不可审核';
			}
		} else {

			$status = '系统处于<strong class="text-danger">关闭</strong>状态，可以查询统计数据，不可填报及审核';
		}

		return View::make( 'dashboard', array( 'title' => $title, 'status' => $status, 'introduction' => $system->introduction ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit() {

		$title = '系统设置';
		$system = System::find( 1 );

		return View::make( 'system.edit', array( 'title' => $title, 'system' => $system ) );
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postUpdate() {

		$data = Input::all();

		$rules = array(
			'website_name' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$system = System::find( 1 );
			$system->website_name = Input::get( 'website_name' );
			$system->introduction = nl2br( Input::get( 'introduction' ) );
			// $system->maintained = Input::get( 'maintained' );

			if ( $system->save() ) {
				return Redirect::route( 'system.edit' )->with( 'flash_success', '系统设置修改成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '修改失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

}
