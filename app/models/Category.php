<?php

class Category extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	public function indexes() {
		return $this->hasMany( 'Index' );
	}

	public function indexdatas() {
		return $this->hasMany( 'Indexdata' );
	}

}
