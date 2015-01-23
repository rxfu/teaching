<?php

class IndexmarkController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList( $id ) {

		$department = Department::find( $id );
		$title = $department->name;
		$setting = Setting::find( 1 );
		$indexmarks = Indexmark::with( 'Mark' )
		->where( 'year', $setting->year )
		->where( 'collection_department', $id )
		->orderBy( 'order', 'asc' )
		->get();
		$indexdatas = Indexdata::with( 'Index' )
		->where( 'year', $setting->year )
		->where( 'collection_department', $id )
		->orderBy( 'order', 'asc' )
		->get();

		return View::make( 'audit.score', array( 'title' => $title, 'indexmarks' => $indexmarks, 'indexdatas' => $indexdatas ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postUpdate( $id ) {

		$data = Input::all();

		$rules = array(
			'mark' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$indexmark = Indexmark::find( $id );
			$indexmark->score = Input::get( 'mark' );

			if ( $indexmark->save() ) {
				return Redirect::back()->with( 'flash_success', '指标评分成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '指标评分失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

	public function getComparison( $year ) {

		$title = $year . '年度指标数据评比表';
		$departments = Indexmark::with( 'Collector' )
		->select( 'collection_department' )
		->distinct()
		->where( 'year', $year )
		->orderBy( 'collection_department' )
		->get();
		$marks = Indexmark::with( 'Mark' )
		->select( 'mark_id' )
		->distinct()
		->where( 'year', $year )
		->orderBy( 'order', 'asc' )
		->get();
		$indexmarks = Indexmark::with( 'Mark' )
		->where( 'year', $year )
		->orderBy( 'order', 'collection_department' )
		->get();

		$datas = array();
		foreach ( $departments as $department ) {

			$datas[$department->collector->id]['department'] = $department->collector->name;
			$datas[$department->collector->id]['total'] = 0;

			foreach ( $indexmarks as $indexmark ) {

				if ( $indexmark->collection_department == $department->collector->id ) {

					$datas[$department->collector->id]['mark' . $indexmark->mark_id] = $indexmark->score;
					$datas[$department->collector->id]['total'] += $indexmark->score;
				}
			}
		}

		return View::make( 'index.comparison', array( 'title' => $title, 'marks' => $marks, 'datas' => $datas ) );
	}

}
