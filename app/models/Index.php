<?php

class Index extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'indexes';

	public function category() {
		return $this->belongsTo( 'Category' );
	}

	public function mark() {
		return $this->belongsTo( 'Mark' );
	}

	public function indexdatas() {
		return $this->hasMany( 'Indexdata' );
	}

	public function collector() {
		return $this->belongsTo( 'department', 'collection_department' );
	}

	public function marker() {
		return $this->belongsTo( 'department', 'mark_department' );
	}

}
