<?php

class IndexdataController extends AdminController {

	private $upload = '/storage/uploads/';

	/**
	 * Display a entry listing of the resource.
	 *
	 * @return Response
	 */
	public function getEntryList( $id ) {

		$setting = Setting::find( 1 );
		$category = Category::find( $id );
		$title = $category->seq . '、' . $category->name;
		$indexdatas = Indexdata::with( 'Index' )
		->where( 'year', $setting->year )
		->where( 'collection_department', Auth::user()->department->id )
		->where( 'category_id', $id )
		->orderBy( 'order', 'asc' )
		->get();

		return View::make( 'entry.list', array( 'title' => $title, 'indexdatas' => $indexdatas ) );
	}

	/**
	 * Display a audit listing of the resource.
	 *
	 * @return Response
	 */
	public function getAuditList( $id ) {

		$setting = Setting::find( 1 );
		$category = Category::find( $id );
		$title = $category->seq . '、' . $category->name;
		$indexes = Indexdata::with( 'Index' )
		->select( 'index_id' )
		->distinct()
		->where( 'year', $setting->year )
		->where( 'mark_department', Auth::user()->department->id )
		->where( 'category_id', $id )
		->orderBy( 'order', 'asc' )
		->get();
		$indexdatas = Indexdata::with( 'Collector' )
		->where( 'year', $setting->year )
		->where( 'mark_department', Auth::user()->department->id )
		->where( 'category_id', $id )
		->orderBy( 'order', 'asc' )
		->get();

		return View::make( 'audit.list', array( 'title' => $title, 'indexes' => $indexes, 'indexdatas' => $indexdatas ) );
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
			'entry' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$indexdata = Indexdata::find( $id );
			$indexdata->data = nl2br( Input::get( 'entry' ) );
			$indexdata->entried = 1;

			if ( $indexdata->save() ) {
				return Redirect::back()->with( 'flash_success', '指标录入成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '指标录入失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

	public function postUpload( $id ) {

		if ( Input::hasFile( 'file' . $id ) ) {

			$file = Input::file( 'file' . $id );

			if ( $file->isValid() ) {

				$rules = array(

					'file' . $id => 'required|max:10000|mimes:pdf,doc,docx,xls,xlsx,rar,zip',
				);
				$validator = Validator::make( Input::all(), $rules );

				if ( $validator->fails() ) {

					return Redirect::back()->withInput()->with( 'flash_error', '上传附件类型无效' );
				}

				$filename = $file->getClientOriginalName();
				$ext = $file->getClientOriginalExtension();
				$mime = $file->getMimeType();
				$size = $file->getSize();

				$setting = Setting::find( 1 );
				$newfile = md5( date( 'YmdHis' ) . $filename ) . '.' . $ext;
				$path = app_path() . $this->upload . $setting->year . '/' . $newfile;
				$file->move( app_path() . $this->upload . $setting->year, $newfile );

				$indexdata = Indexdata::find( $id );
				$indexdata->filename = $newfile;

				if ( $indexdata->save() ) {
					return Redirect::back()->with( 'flash_success', '附件上传成功' );
				} else {
					return Redirect::back()->withInput()->with( 'flash_error', '附件上传失败' );
				}
			}

			return Redirect::back()->with( 'flash_error', '附件无效' );
		} else {

			return Redirect::back()->withInput()->with( 'flash_error', '附件上传失败' );
		}
	}

	public function postDeleteFile( $id ) {

		$indexdata = Indexdata::find( $id );

		if ( is_null( $indexdata ) ) {

			return Redirect::back()->with( 'flash_error', '没有可删除的文件' );
		} else {

			$indexdata->filename = null;

			if ( $indexdata->save() ) {

				return Redirect::back()->with( 'flash_success', '附件删除成功' );
			} else {

				return Redirect::back()->with( 'flash_error', '附件删除失败' );
			}
		}
	}

	public function getDownload( $id ) {

		$indexdata = Indexdata::find( $id );
		$path = $this->upload . $indexdata->year . '/' . $indexdata->filename;

		return Response::download( app_path() . $path );
	}

	public function postCheck( $id ) {

		$indexdata = Indexdata::find( $id );
		$indexdata->checked = Input::get( 'checked' ) == 'true' ? 1 : 0;

		if ( $indexdata->save() ) {
			return Redirect::back()->with( 'flash_success', '指标审核成功' );
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', '指标审核失败' );
		}
	}

	public function postPass( $id ) {

		$indexdata = Indexdata::find( $id );
		$indexdata->passed = Input::get( 'passed' ) == 'true' ? 1 : 0;

		if ( $indexdata->save() ) {
			return Redirect::back()->with( 'flash_success', '指标审核通过成功' );
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', '指标审核通过失败' );
		}
	}

	public function getState() {

		$title = '指标监控';
		$setting = Setting::find( 1 );
		$states = Indexdata::with( 'Index', 'Collector' )
		->where( 'year', $setting->year )
		->where( function( $query ) {
				$query->where( 'entried', 0 )
				->orWhere( 'checked', 0 )
				->orWhere( 'passed', 0 );
			} )
		->orderBy( 'order', 'asc' )
		->get();

		return View::make( 'index.monitor', array( 'title' => $title, 'states' => $states ) );
	}

	public function getStatistics( $year ) {

		$title = $year - 1 . '~' . $year . '学年度指标数据统计表';
		$departments = Indexdata::with( 'Collector' )
		->select( 'collection_department' )
		->distinct()
		->where( 'year', $year )
		->orderBy( 'collection_department' )
		->get();
		$indexes = Indexdata::with( 'Index' )
		->select( 'index_id' )
		->distinct()
		->where( 'year', $year )
		->orderBy( 'order', 'asc' )
		->get();
		$indexdatas = Indexdata::with( 'Index', 'Category' )
		->where( 'year', $year )
		->orderBy( 'category_id', 'order', 'collection_department' )
		->get();

		$datas = array();
		foreach ( $indexes as $index ) {

			$datas[$index->index_id]['category'] = $index->index->category->name;
			$datas[$index->index_id]['seq'] = $index->index->seq;
			$datas[$index->index_id]['index'] = $index->index->name;

			foreach ( $indexdatas as $indexdata ) {

				if ( $index->index_id == $indexdata->index_id ) {

					$datas[$index->index_id]['department' . $indexdata->collection_department] = $indexdata->data;
				}
			}
		}

		return View::make( 'index.statistics', array( 'title' => $title, 'year' => $year, 'departments' => $departments, 'datas' => $datas ) );
	}

	public function getCompare( $year, $id ) {

		$indexdatas = Indexdata::with( 'Index', 'Collector' )
		->where( 'index_id', $id )
		->where( 'year', $year )
		->orderBy( 'collection_department' )
		->get();
		$title = '二级指标对比表';

		return View::make( 'index.compare', array( 'title' => $title, 'indexdatas' => $indexdatas ) );
	}

	public function getStatisticsExcel( $year ) {

		$sheetName = ( $year - 1 ) . '~' . $year . '学年度指标数据统计表';
		$departments = Indexdata::with( 'Collector' )
		->select( 'collection_department' )
		->distinct()
		->where( 'year', $year )
		->orderBy( 'collection_department' )
		->get();
		$indexes = Indexdata::with( 'Index' )
		->select( 'index_id' )
		->distinct()
		->where( 'year', $year )
		->orderBy( 'order', 'asc' )
		->get();
		$indexdatas = Indexdata::with( 'Index', 'Category' )
		->where( 'year', $year )
		->orderBy( 'category_id', 'order', 'collection_department' )
		->get();

		$datas[0] = array( '一级指标', '序号', '二级指标' );
		foreach ( $departments as $department ) {

			$datas[0][] = $department->collector->name;
		}

		foreach ( $indexes as $index ) {

			$row = array();
			$row[] = $index->index->category->name;
			$row[] = $index->index->seq;
			$row[] = $index->index->name;

			foreach ( $indexdatas as $indexdata ) {

				if ( $indexdata->index_id == $index->index_id ) {

					$row[] = $indexdata->data;
				}
			}

			$datas[] = $row;
		}

		Excel::create( 'export', function( $excel ) use( $sheetName, $datas ) {

				$excel->setTitle( 'Guangxi Normal University Teaching State Statistics Report' );
				$excel->setCreator( 'Dean' )->setCompany( 'Guangxi Normal University' );

				$excel->sheet( $sheetName, function( $sheet ) use( $datas ) {

						$sheet->setOrientation( 'landscape' );

						$sheet->fromArray( $datas, null, 'A1', false, false );
					} );
			} )->export( 'xls' );
	}

	public function getDepartmentStatisticsExcel( $year ) {

		$sheetName = ( $year - 1 ) . '~' . $year . '学年度' . Auth::user()->department->name . '指标数据统计表';
		$indexes = Indexdata::with( 'Index' )
		->select( 'index_id' )
		->distinct()
		->where( 'year', $year )
		->where( 'collection_department', Auth::user()->department_id )
		->orderBy( 'order', 'asc' )
		->get();
		$indexdatas = Indexdata::with( 'Index', 'Category' )
		->where( 'year', $year )
		->where( 'collection_department', Auth::user()->department_id )
		->orderBy( 'category_id', 'order' )
		->get();

		$datas[0] = array( '一级指标', '序号', '二级指标', Auth::user()->department->name );

		foreach ( $indexes as $index ) {

			$row = array();
			$row[] = $index->index->category->name;
			$row[] = $index->index->seq;
			$row[] = $index->index->name;

			foreach ( $indexdatas as $indexdata ) {

				if ( $indexdata->index_id == $index->index_id ) {

					$row[] = $indexdata->data;
					break;
				}
			}

			$datas[] = $row;
		}

		Excel::create( 'export', function( $excel ) use( $sheetName, $datas ) {

				$excel->setTitle( 'Guangxi Normal University Teaching State College Statistics Report' );
				$excel->setCreator( 'Dean' )->setCompany( 'Guangxi Normal University' );

				$excel->sheet( $sheetName, function( $sheet ) use( $datas ) {

						$sheet->setOrientation( 'landscape' );

						$sheet->fromArray( $datas, null, 'A1', false, false );
					} );
			} )->export( 'xls' );
	}

	public function getCompareExcel( $year, $id ) {

		$indexdatas = Indexdata::with( 'Index', 'Collector' )
		->where( 'index_id', $id )
		->where( 'year', $year )
		->orderBy( 'collection_department' )
		->get();
		$sheetName = ( $year - 1 ) . '~' . $year . '学年度单指标数据对比表';

		$datas[0] = array( '填报部门', $indexdatas[0]->index->name );
		foreach ( $indexdatas as $indexdata ) {

			$row = array();
			$row[] = $indexdata->collector->name;
			$row[] = $indexdata->data;

			$datas[] = $row;
		}

		Excel::create( 'export', function( $excel ) use( $sheetName, $datas ) {

				$excel->setTitle( 'Guangxi Normal University Teaching State Single Index Comparing Report' );
				$excel->setCreator( 'Dean' )->setCompany( 'Guangxi Normal University' );

				$excel->sheet( $sheetName, function( $sheet ) use( $datas ) {

						$sheet->setOrientation( 'landscape' );

						$sheet->fromArray( $datas, null, 'A1', false, false );
					} );
			} )->export( 'xls' );
	}

	public function getMonitorExcel() {

		$setting = Setting::find( 1 );
		$states = Indexdata::with( 'Index', 'Collector' )
		->where( 'year', $setting->year )
		->where( function( $query ) {
				$query->where( 'entried', 0 )
				->orWhere( 'checked', 0 )
				->orWhere( 'passed', 0 );
			} )
		->orderBy( 'order', 'asc' )
		->get();
		$sheetName = '当前学年度指标数据采集监控表';

		$datas[0] = array( '填报部门', '序号', '二级指标', '填报状态', '审核状态', '通过状态' );
		foreach ( $states as $state ) {

			$row = array();
			$row[] = $state->collector->name;
			$row[] = $state->index->seq;
			$row[] = $state->index->name;
			$row[] = $state->entried ? '已填报' : '未填报';
			$row[] = $state->checked ? '已审核' : '未审核';
			$row[] = $state->passed ? '已通过' : '未通过';

			$datas[] = $row;
		}

		Excel::create( 'export', function( $excel ) use( $sheetName, $datas ) {

				$excel->setTitle( 'Guangxi Normal University Teaching State Collection Monitor Report' );
				$excel->setCreator( 'Dean' )->setCompany( 'Guangxi Normal University' );

				$excel->sheet( $sheetName, function( $sheet ) use( $datas ) {

						$sheet->setOrientation( 'landscape' );

						$sheet->fromArray( $datas, null, 'A1', false, false );
					} );
			} )->export( 'xls' );
	}

}
