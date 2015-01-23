<?php

class Indexmark extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'indexmarks';

	public function mark() {
		return $this->belongsTo( 'Mark' );
	}

	public function collector() {
		return $this->belongsTo( 'Department', 'collection_department' );
	}

	public function marker() {
		return $this->belongsTo( 'Department', 'mark_department' );
	}

}
