<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
		// Created an additional migration to form section type and section
		// relationship.  Needs to happen after the section_types table is
		// created
		Schema::table('sections', function($table) {
			$table->foreign('section_type_id')
				->references('section_type_id')->on('section_types')
				->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
