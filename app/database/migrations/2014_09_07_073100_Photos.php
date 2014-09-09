<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create("Photos", function(Blueprint $table){
                   $table->increment('id');
                   $table->string('name');
                   $table->string('thumbnail');
                   $table->timestamps();
                   
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("Photos");
	}

}
