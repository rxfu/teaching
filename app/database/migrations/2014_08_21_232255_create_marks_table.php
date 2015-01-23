<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'marks', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'seq', 20 )->nullable();
				$table->string( 'name', 60 );
				$table->text( 'description' )->nullable();
				$table->decimal( 'score', 5, 2 )->default( 0 );
				$table->integer( 'order' )->default( 0 );
				$table->integer( 'department_id' );
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
		Schema::drop( 'marks' );
	}

}
