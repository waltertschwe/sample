<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
			// Primary Key
			$table->increments('product_id');
			
			// Foreign Keys
			$table->integer('website_id')->unsigned();
			// End Foreign Keys
			
			//  Fields
			$table->integer('default_post_section_id')->nullable();
			$table->integer('old_product_id')->nullable();
			$table->string('name', 250)->nullable();
			$table->string('room_name', 90)->nullable();
			$table->string('credit_card_code', 3)->nullable();
			$table->boolean('is_active')->default(0);
			$table->boolean('is_alert_recommended')->default(0);
			$table->boolean('is_pm_access')->default(0);
			$table->boolean('is_institutional')->default(0);
			$table->integer('display_order')->default(99);
			$table->string('terms_text', 255)->nullable();
			$table->text('description')->nullable();
			$table->string('short_description', 255)->nullable();
			$table->string('prod_email_description', 255)->nullable();
			$table->integer('default_post_section')->nullable();
			$table->string('no_sub_header', 200)->nullable();
			$table->text('no_sub_description')->nullable();
			
			// below fields will contain product IDs
			$table->integer('must_have_active')->nullable();
			$table->integer('must_have_expired')->nullable();
			$table->integer('must_not_have_active')->nullable();
			$table->integer('must_not_have_expired')->nullable();
			
			$table->timestamps();
		});
		
		// Foreign Key Relationships
		Schema::table('products', function($table) {
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
        Schema::dropIfExists('products');
    }
}
