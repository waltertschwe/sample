<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_types', function (Blueprint $table) {
			$table->increments('section_type_id');
			$table->integer('old_section_type_id')->nullable();
			$table->string('section_type', 50)->nullable();
			$table->string('class', 50)->nullable();
			$table->string('type_description', 255)->nullable();
			$table->timestamps();
		});
		
		// Website and Section Type Pivot Table
		Schema::create('website_section_type_pivot', function($table) {
			$table->integer('website_id');
			$table->integer('section_type_id');
			$table->primary(['website_id', 'section_type_id']);
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_types');
    }
}
