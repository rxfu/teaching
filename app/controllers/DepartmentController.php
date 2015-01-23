<?php

class DepartmentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '部门列表';
		$departments = Department::orderBy( 'name', 'asc' )->get();

		return View::make( 'department.list', array( 'title' => $title, 'departments' => $departments ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '添加新部门';

		return View::make( 'department.new', array( 'title' => $title ) );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'name' => 'required|unique:departments',
			'collected' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$department = new Department;
			$department->name = Input::get( 'name' );
			$department->collected = Input::get( 'collected' );
			$department->description = nl2br( Input::get( 'description' ) );
			$department->collector = Input::get( 'collector' );
			$department->marker = Input::get( 'marker' );

			if ( $department->save() ) {
				return Redirect::route( 'department.list' )->with( 'flash_success', '部门 ' . $department->name . ' 添加成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '部门添加失败' );
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

		$title = '部门详细信息';
		$department = Department::find( $id );

		return View::make( 'department.show', array( 'title' => $title, 'department' => $department ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑部门';
		$department = Department::find( $id );

		return View::make( 'department.edit', array( 'title' => $title, 'department' => $department )  );
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
			'collected' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$department = Department::find( $id );
			$department->collected = Input::get( 'collected' );
			$department->description = nl2br( Input::get( 'description' ) );
			$department->collector = Input::get( 'collector' );
			$department->marker = Input::get( 'marker' );

			if ( $department->save() ) {
				return Redirect::route( 'department.list' )->with( 'flash_success', '部门 ' . $department->name . ' 修改成功' );
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

		$department = Department::find( $id );

		if ( is_null( $department ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到部门' );
		} elseif ( $department->delete() ) {
			return Redirect::route( 'department.list' )->with( 'flash_success', '部门删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '部门删除失败' );
		}
	}

}
