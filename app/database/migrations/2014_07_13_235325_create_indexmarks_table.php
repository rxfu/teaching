<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexmarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'indexmarks', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->integer( 'mark_id' );
				$table->decimal( 'score', 5, 2 )->nullable();
				$table->string( 'year', 4 );
				$table->integer( 'collection_department' )->nullable();
				$table->integer( 'mark_department' )->nullable();
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
		Schema::drop( 'indexmarks' );
	}

}
