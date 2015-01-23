<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'systems', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'website_name', 255 );
				$table->text( 'introduction' )->nullable();
				$table->boolean( 'maintained' )->default( 0 );
				$table->timestamps();
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'systems' );
	}

}
