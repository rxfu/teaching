<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'categories', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'seq', 20 )->nullable();
				$table->string( 'name', 60 );
				$table->text( 'description' )->nullable();
				$table->integer( 'order' )->default( 0 );
				$table->timestamps();
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'categories' );
	}

}
