<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_groups', function (Blueprint $table) {
        	// primary key
			 $table->increments('notification_group_id');
			
			// Foreign Keys
			$table->integer('website_id')->unsigned();
			
			//  Fields
			$table->integer('old_notification_group_id')->nullable();
			$table->string('name', 100)->nullable();
			$table->string('description', 255)->nullable();
			
			// old schema is enum. will make string but could use lookup table
			$table->string('alert_type', 50)->nullable(); 
			$table->integer('sort_order')->default(100);
			$table->integer('must_have_product_id')->nullable();
			$table->integer('must_not_have_product_id')->nullable();
			$table->boolean('email_default')->default(0);
			$table->string('line_type', 32)->nullable();
			$table->string('field_name', 32)->nullable();
			
            $table->timestamps();
        });
		
		// Foreign Key Relationships
		Schema::table('notification_groups', function($table) {
			$table->foreign('website_id')
					->references('website_id')->on('websites')
					->onDelete('cascade');
		});
		
		// CREATE Section & Notification Group Pivot Table
		Schema::create('section_notification_group', function($table) {
			$table->integer('section_id');
			$table->integer('n_group_id');
			$table->primary(['section_id', 'n_group_id']);
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_groups');
    }
}
