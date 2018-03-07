<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('website_id');
			$table->string('name', 32)->nullable();
			$table->string('domain', 32)->nullable();
			$table->string('directory', 32)->nullable();
			$table->string('short_code', 5)->nullable();
            $table->timestamps();
        });
		
		// Foreign Key Relationships
		Schema::table('users', function($table) {
			$table->foreign('website_id')
				->references('website_id')->on('websites')
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
        Schema::dropIfExists('websites');
    }
}
