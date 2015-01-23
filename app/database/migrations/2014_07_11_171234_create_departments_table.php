<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'departments', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'name', 60 );
				$table->boolean( 'collected' )->default( 0 );
				$table->text( 'description' )->nullable();
				$table->boolean( 'collector' )->default( 0 );
				$table->boolean( 'marker' )->default( 0 );
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'departments' );
	}

}
