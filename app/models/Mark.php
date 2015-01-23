<?php

class Mark extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'marks';

	public function department() {
		return $this->belongsTo( 'Department' );
	}

	public function indexes() {
		return $this->hasMany( 'Index' );
	}

	public function indexdatas() {
		return $this->hasMany( 'Indexdata' );
	}

	public function indexmarks() {
		return $this->hasMany( 'Indexmark' );
	}

}
