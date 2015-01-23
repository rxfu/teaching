<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get( '/', array( 'as' => 'home', function() {
			return Redirect::route( 'dashboard' );
		} ) );

Route::get( 'login', array( 'as' => 'login', 'uses' => 'UserController@getLogin' ) );
Route::get( 'logout', array( 'as' => 'logout', 'uses' => 'UserController@getLogout' ) );
Route::post( 'login', 'UserController@postLogin' );

Route::get( 'dashboard', array( 'as' => 'dashboard', 'uses' => 'SystemController@getDashboard' ) );
Route::get( 'denied', array( 'as' => 'user.denied', 'uses' => 'UserController@getDeny' ) );

Route::group( array( 'prefix' => 'user', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'user.list', 'uses' =>'UserController@getList' ) );
		Route::get( 'new', array( 'as' => 'user.new', 'uses' => 'UserController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'user.show', 'uses' => 'UserController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'user.edit', 'uses' => 'UserController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'user.save', 'uses' => 'UserController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'user.update', 'uses' => 'UserController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'user.delete', 'uses' => 'UserController@postDestroy' ) );
		// Route::get( '{id}/reset_password', array( 'as' => 'user.reset', 'uses' => 'UserController@getResetPassword' ) );
		Route::put( '{id}/reset', array( 'as' => 'user.reset', 'uses' => 'UserController@postResetPassword' ) );
		Route::get( 'change_password', array( 'as' => 'user.change', 'uses' => 'UserController@getChangePassword' ) );
		Route::put( 'change', array( 'as' => 'user.saveChange', 'uses' => 'UserController@postChangePassword' ) );
		Route::get( 'profile', array( 'as' => 'user.profile', 'uses' => 'UserController@getProfile' ) );
	} );

Route::group( array( 'prefix' => 'department', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'department.list', 'uses' => 'DepartmentController@getList' ) );
		Route::get( 'new', array( 'as' => 'department.new', 'uses' => 'DepartmentController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'department.show', 'uses' => 'DepartmentController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'department.edit', 'uses' => 'DepartmentController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'department.save', 'uses' => 'DepartmentController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'department.update', 'uses' => 'DepartmentController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'department.delete', 'uses' => 'DepartmentController@postDestroy' ) );
	} );

Route::group( array( 'prefix' => 'group', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'group.list', 'uses' => 'GroupController@getList' ) );
		Route::get( 'new', array( 'as' => 'group.new', 'uses' => 'GroupController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'group.show', 'uses' => 'GroupController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'group.edit', 'uses' => 'GroupController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'group.save', 'uses' => 'GroupController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'group.update', 'uses' => 'GroupController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'group.delete', 'uses' => 'GroupController@postDestroy' ) );
		Route::get( '{id}/grant', array( 'as' => 'group.grant', 'uses' => 'GroupController@getGrant' ) );
		Route::post( '{id}/grant', array( 'as' => 'group.saveGrant', 'uses' => 'GroupController@postGrant' ) );
	} );

Route::group( array( 'prefix' => 'permission', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'permission.list', 'uses' => 'PermissionController@getList' ) );
		Route::get( 'new', array( 'as' => 'permission.new', 'uses' => 'PermissionController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'permission.show', 'uses' => 'PermissionController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'permission.edit', 'uses' => 'PermissionController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'permission.save', 'uses' => 'PermissionController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'permission.update', 'uses' => 'PermissionController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'permission.delete', 'uses' => 'PermissionController@postDestroy' ) );
	} );

Route::group( array( 'prefix' => 'category', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'category.list', 'uses' => 'CategoryController@getList' ) );
		Route::get( 'new', array( 'as' => 'category.new', 'uses' => 'CategoryController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'category.show', 'uses' => 'CategoryController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'category.edit', 'uses' => 'CategoryController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'category.save', 'uses' => 'CategoryController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'category.update', 'uses' => 'CategoryController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'category.delete', 'uses' => 'CategoryController@postDestroy' ) );
	} );
/*
Route::group( array( 'prefix' => 'mark', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'mark.list', 'uses' => 'MarkController@getList' ) );
		Route::get( 'new', array( 'as' => 'mark.new', 'uses' => 'MarkController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'mark.show', 'uses' => 'MarkController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'mark.edit', 'uses' => 'MarkController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'mark.save', 'uses' => 'MarkController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'mark.update', 'uses' => 'MarkController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'mark.delete', 'uses' => 'MarkController@postDestroy' ) );
	} );
*/
Route::group( array( 'prefix' => 'index', 'before' => 'user.permitted' ), function() {
		Route::get( 'list', array( 'as' => 'index.list', 'uses' => 'IndexController@getList' ) );
		Route::get( 'new', array( 'as' => 'index.new', 'uses' => 'IndexController@getNew' ) );
		Route::get( '{id}/show', array( 'as' => 'index.show', 'uses' => 'IndexController@getShow' ) );
		Route::get( '{id}/edit', array( 'as' => 'index.edit', 'uses' => 'IndexController@getEdit' ) );
		Route::post( 'save', array( 'as' => 'index.save', 'uses' => 'IndexController@postSave' ) );
		Route::put( '{id}/update', array( 'as' => 'index.update', 'uses' => 'IndexController@postUpdate' ) );
		Route::delete( '{id}/destroy', array( 'as' => 'index.delete', 'uses' => 'IndexController@postDestroy' ) );
		Route::get( 'monitor', array( 'as' => 'index.monitor', 'uses' => 'IndexdataController@getState' ) );
		Route::get( '{year}/statistics', array( 'as' => 'index.statistics', 'uses' => 'IndexdataController@getStatistics' ) );
		// Route::get( '{year}/comparison', array( 'as' => 'index.comparison', 'uses' => 'IndexmarkController@getComparison' ) );
		Route::get( '{year}/{id}/compare', array( 'as' => 'index.compare', 'uses' => 'IndexdataController@getCompare' ) );
		Route::get( '{year}/exportStatistics', array( 'as' => 'index.exportStatistics', 'uses' => 'IndexdataController@getStatisticsExcel' ) );
		Route::get( '{year}/exportDepartmentStatistics', array( 'as' => 'index.exportDepartmentStatistics', 'uses' => 'IndexdataController@getDepartmentStatisticsExcel' ) );
		Route::get( '{year}/{id}/exportCompare', array( 'as' => 'index.exportCompare', 'uses' => 'IndexdataController@getCompareExcel' ) );
		Route::get( 'exportMonitor', array( 'as' => 'index.exportMonitor', 'uses' => 'IndexdataController@getMonitorExcel' ) );
	} );

Route::group( array( 'prefix' => 'system', 'before' => 'user.permitted' ), function() {
		Route::get( 'edit', array( 'as' => 'system.edit', 'uses' => 'SystemController@getEdit' ) );
		Route::put( 'update', array( 'as' => 'system.update', 'uses' => 'SystemController@postUpdate' ) );
	} );

Route::group( array( 'prefix' => 'setting', 'before' => 'user.permitted' ), function() {
		Route::get( 'edit', array( 'as' => 'setting.edit', 'uses' => 'SettingController@getEdit' ) );
		Route::put( 'update', array( 'as' => 'setting.update', 'uses' => 'SettingController@postUpdate' ) );
		Route::get( 'init', array( 'as' => 'setting.init', 'uses' => 'SettingController@getInit' ) );
		Route::get( 'clean', array( 'as' => 'setting.clean', 'uses' => 'SettingController@getClean' ) );
	} );

Route::group( array( 'prefix' => 'entry', 'before' => 'user.permitted' ), function() {
		Route::get( '{id}/list', array( 'as' => 'entry.list', 'uses' => 'IndexdataController@getEntryList' ) );
		Route::put( '{id}/update', array( 'as' => 'entry.update', 'uses' => 'IndexdataController@postUpdate' ) );
		Route::put( '{id}/upload', array( 'as' => 'entry.upload', 'uses' => 'IndexdataController@postUpload' ) );
		Route::put( '{id}/deleteFile', array( 'as' => 'entry.deleteFile', 'uses' => 'IndexdataController@postDeleteFile' ) );
		Route::get( '{id}/download', array( 'as' => 'entry.download', 'uses' => 'IndexdataController@getDownload' ) );
	} );

Route::group( array( 'prefix' => 'audit', 'before' => 'user.permitted' ), function() {
		Route::get( '{id}/list', array( 'as' => 'audit.list', 'uses' => 'IndexdataController@getAuditList' ) );
		Route::put( '{id}/update', array( 'as' => 'audit.update', 'uses' => 'IndexdataController@postUpdate' ) );
		Route::put( '{id}/check', array( 'as' => 'audit.check', 'uses' => 'IndexdataController@postCheck' ) );
		Route::put( '{id}/pass', array( 'as' => 'audit.pass', 'uses' => 'IndexdataController@postPass' ) );
		// Route::get( '{id}/score', array( 'as' => 'audit.score', 'uses' => 'IndexmarkController@getList' ) );
		// Route::put( '{id}/mark', array( 'as' => 'audit.mark', 'uses' => 'IndexmarkController@postUpdate' ) );
	} );
