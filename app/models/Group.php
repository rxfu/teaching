<?php

class Group extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';

	public $timestamps = false;

	public function users() {
		return $this->belongsToMany( 'User', 'user_groups' );
	}

	public function permissions() {
		return $this->belongsToMany( 'Permission', 'group_permissions' );
	}
}
