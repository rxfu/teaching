<?php

class MarkController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '评比项目列表';
		$marks = Mark::with( 'Department' )->orderBy( 'order', 'asc' )->get();

		return View::make( 'mark.list', array( 'title' => $title, 'marks' => $marks ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '添加评比项目';
		$department = Department::where( 'marker', 1 )
		->orderBy( 'name', 'asc' )
		->lists( 'name', 'id' );

		return View::make( 'mark.new', array( 'title' => $title, 'department' => $department ) );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'name' => 'required|unique:marks',
			'order' => 'numeric',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$mark = new Mark;
			$mark->seq = Input::get( 'seq' );
			$mark->name = Input::get( 'name' );
			$mark->score = Input::get( 'score' );
			$mark->description = nl2br( Input::get( 'description' ) );
			$mark->order = Input::get( 'order' );
			$mark->department_id = Input::get( 'department' );
			$mark->activated = Input::get( 'activated' );
			$mark->memo = nl2br( Input::get( 'memo' ) );

			if ( $mark->save() ) {
				return Redirect::route( 'mark.list' )->with( 'flash_success', '评比项目 ' . $mark->name . ' 添加成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '评比项目添加失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getShow( $id ) {

		$title = '评比项目详细信息';
		$mark = Mark::find( $id );

		return View::make( 'mark.show', array( 'title' => $title, 'mark' => $mark ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑评比项目';
		$mark = Mark::find( $id );
		$department = Department::where( 'marker', 1 )
		->orderBy( 'name', 'asc' )
		->lists( 'name', 'id' );

		return View::make( 'mark.edit', array( 'title' => $title, 'mark' => $mark, 'department' => $department )  );
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
			'order' => 'numeric',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$mark = Mark::find( $id );
			$mark->seq = Input::get( 'seq' );
			$mark->name = Input::get( 'name' );
			$mark->score = Input::get( 'score' );
			$mark->description = nl2br( Input::get( 'description' )  );
			$mark->order = Input::get( 'order' );
			$mark->department_id = Input::get( 'department' );
			$mark->activated = Input::get( 'activated' );
			$mark->memo = nl2br( Input::get( 'memo' ) );

			if ( $mark->save() ) {
				return Redirect::route( 'mark.list' )->with( 'flash_success', '评比项目 ' . $mark->name . ' 修改成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '修改失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postDestroy( $id ) {

		$mark = Mark::find( $id );

		if ( is_null( $mark ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到评比项目' );
		} elseif ( $mark->delete() ) {
			return Redirect::route( 'mark.list' )->with( 'flash_success', '评比项目删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '评比项目删除失败' );
		}
	}

}
