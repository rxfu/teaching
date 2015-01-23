<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexdatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'indexdatas', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->integer( 'index_id' );
				$table->text( 'data' )->nullable();
				$table->string( 'year', 4 );
				$table->string( 'filename', 255 )->nullable();
				$table->integer( 'category_id' )->nullable();
				$table->integer( 'mark_id' )->nullable();
				$table->integer( 'collection_department' )->nullable();
				$table->integer( 'mark_department' )->nullable();
				$table->boolean( 'entried' )->default( 0 );
				$table->boolean( 'checked' )->default( 0 );
				$table->boolean( 'passed' )->default( 0 );
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
		Schema::drop( 'indexdatas' );
	}

}
