<?php

/**
 * 权限过滤器类
 */
class PermittedFilter {

	public function filter( $route, $request ) {

		$permitted = false;

		$user = Auth::user();

		foreach ( $user->groups as $group ) {

			if ( $group->permissions->contains( $route->getName() ) ) {

				$permitted = true;
				break;
			}
		}

		if ( !$permitted ) {

			return Redirect::route( 'user.denied' );
		}
	}
}
