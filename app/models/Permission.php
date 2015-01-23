<?php

class Permission extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permissions';

	public $timestamps = false;

	public function getKey() {
		return $this->attributes['identify'];
	}

	public function groups() {
		return $this->belongsToMany( 'Group', 'group_permissions' );
	}

}
