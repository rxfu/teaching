<?php

View::composer( 'master', function( $view ) {

		$system = System::find( 1 );
		$setting = Setting::find( 1 );
		$categories = Category::orderBy( 'order' )->get();
		$indexdatas = Indexdata::select( 'year' )->distinct()->get();

		$view->with( 'website_name', $system->website_name )
		->with( 'categories', $categories )
		->with( 'indexdatas', $indexdatas )
		->with( 'setting', $setting );
	} );

View::composer( 'login', function( $view ) {

		$system = System::find( 1 );

		$view->with( 'website_name', $system->website_name );
	} );
