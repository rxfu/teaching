<?php

class SettingController extends AdminController {

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit() {

		$title = '系统设置';
		$setting = Setting::find( 1 );

		return View::make( 'setting.edit', array( 'title' => $title, 'setting' => $setting ) );
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
			'year' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$setting = Setting::find( 1 );
			$setting->year = Input::get( 'year' );
			$setting->opened = Input::get( 'opened' );
			$setting->collected = Input::get( 'collected' );
			$setting->marked = Input::get( 'marked' );

			$now = date( 'Y-m-d H:i:s' );
			$setting->updated_at = $now;

			if ( $setting->save() ) {
				return Redirect::route( 'setting.edit' )->with( 'flash_success', '采集设置修改成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '修改失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

	public function getInit() {

		$setting = Setting::find( 1 );
		$count = Indexdata::where( 'year', $setting->year )->count();

		if ( $count ) {
			return Redirect::route( 'setting.edit' )->with( 'flash_error', '系统已经初始化过，若需要重新初始化，请先清理系统' );
		}

		$indexes = Index::where( 'activated', 1 )->orderBy( 'order', 'asc' )->get();
		foreach ( $indexes as $index ) {

			if ( $index->collection_department == 'all' ) {

				$departments = Department::where( 'collector', 1 )->get();
				foreach ( $departments as $department ) {

					$indexdata = new Indexdata();
					$indexdata->index_id = $index->id;
					$indexdata->year = $setting->year;
					$indexdata->category_id = $index->category_id;
					$indexdata->mark_id = $index->mark_id;
					$indexdata->collection_department = $department->id;
					$indexdata->mark_department = $index->mark_department;
					$indexdata->order = $index->order;

					if ( ! $indexdata->save() ) {

						return Redirect::route( 'setting.edit' )->with( 'flash_error', '指标数据初始化失败' );
					}
				}
			}
		}
		/*
		$marks = Mark::where( 'activated', 1 )->orderBy( 'order', 'asc' )->get();
		foreach ( $marks as $mark ) {

			$collectors = Indexdata::select( 'collection_department' )->distinct()->where( 'year', $setting->year )->where( 'mark_id', $mark->id )->get();
			foreach ( $collectors as $collector ) {

				$indexmark = new Indexmark();
				$indexmark->mark_id = $mark->id;
				$indexmark->year = $setting->year;
				$indexmark->collection_department = $collector->collection_department;
				$indexmark->mark_department = $mark->department_id;
				$indexmark->order = $mark->order;

				if ( ! $indexmark->save() ) {

					return Redirect::route( 'setting.edit' )->with( 'flash_error', '审核数据初始化失败' );
				}
			}
		}
*/
		return Redirect::route( 'setting.edit' )->with( 'flash_success', '数据初始化成功' );
	}

	public function getClean() {

		$setting = Setting::find( 1 );
		$count = Indexdata::where( 'year', $setting->year )->count();

		if ( $count ) {

			if ( Indexdata::where( 'year', $setting->year )->delete() ) {
				return Redirect::route( 'setting.edit' )->with( 'flash_success', '数据清理成功' );
			} else {
				return Redirect::route( 'setting.edit' )->with( 'flash_error', '数据清理失败' );
			}
		} else {
			return Redirect::route( 'setting.edit' )->with( 'flash_error', '系统还未初始化，请先初始化系统' );
		}
	}

}
