<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('promotions', function (Blueprint $table) {
			$table->increments('promotion_id');
			$table->integer('website_id')->unsigned();
			$table->integer('old_promotion_id')->nullable();
			
			// Fields
			$table->string('ref', 20)->nullable();
			$table->string('name', 100)->nullable();
			$table->string('description', 200)->nullable();
			$table->boolean('is_active')->default(1);
			$table->dateTime('start_date')->nullable();
			$table->dateTime('end_date')->nullable();
			$table->timestamps();
		});
		
		// CREATE Product & Section Pivot Table
		Schema::create('product_promotion_pivot', function($table) {
			$table->integer('product_id');
			$table->integer('promotion_id');
			$table->primary(['product_id', 'promotion_id']);
		});
		
		// Foreign Key Relationship with Website
		Schema::table('promotions', function($table) {
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
        Schema::dropIfExists('promotions');
		Schema::dropifExists('product_promotion_pivot');
    }
}
