<?php

class Department extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	public $timestamps = false;

	public function users() {
		return $this->hasMany( 'User' );
	}

	public function indexdatas() {
		return $this->hasMany( 'Indexdata' );
	}

	public function indexmarks() {
		return $this->hasMany( 'Indexmark' );
	}

}
