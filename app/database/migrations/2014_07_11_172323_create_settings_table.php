<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'settings', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'year', 4 );
				$table->boolean( 'opened' )->default( 1 );
				$table->boolean( 'collected' )->default( 0 );
				$table->boolean( 'marked' )->default( 0 );
				$table->timestamps();
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'settings' );
	}

}
