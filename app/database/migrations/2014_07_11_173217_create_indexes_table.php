<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'indexes', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'seq', 20 )->nullable();
				$table->string( 'name', 60 );
				$table->text( 'description' )->nullable();
				$table->string( 'type', 20 );
				$table->boolean( 'has_file' )->default( 0 );
				$table->integer( 'order' )->default( 0 );
				$table->string( 'collection_department', 255 );
				$table->integer( 'mark_department' );
				$table->integer( 'category_id' );
				$table->integer( 'mark_id' )->nullable();
				$table->boolean( 'activated' )->default( 1 );
				$table->text( 'memo' )->nullable();
				$table->timestamps();
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'indexes' );
	}

}
