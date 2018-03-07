<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('sections', function (Blueprint $table) {
			$table->increments('section_id');

			// Foreign Keys
			$table->integer('website_id')->unsigned();
			$table->integer('section_type_id')->unsigned();
			
			// fields
			$table->integer('old_section_id')->nullable();
			$table->string('name', 100)->nullable();
			$table->string('room_name', 50)->nullable();
			$table->integer('display_order')->default(999);
			// $table->string('content_table', 50)->nullable(); DEPRECATED
			$table->boolean('is_trading_room_section')->default(0);
			$table->string('url_path', 250)->nullable();
			$table->string('description', 255)->nullable();
			$table->string('email_description', 255)->nullable();
			// TODO: Nofication Page Name & Description need to be normazlied
			// into new tables.
			// $table->string('notification_page_name', 255)->nullable(); DEPRECATED
			//$table->string('notification_description', 255)->nullable(); DEPRECATAED
			// $table->text('comtex_footer')->nullable(); DEPRECATED
			
			// attributes
			$table->boolean('is_email_notify')->default(0);
			$table->boolean('is_email_notify_default')->default(0);
			$table->boolean('is_hide_notify_checkboxes')->default(0);
			$table->boolean('is_hide_user_editable')->default(0);
			$table->boolean('is_integrate_trading_room')->default(0);
			// $table->boolean('is_publish_advice_trade')->default(0); DEPRECATED
			// $table->boolean('is_publish_newsfeed')->default(0); DEPRECATED
			$table->boolean('is_publish_comtex')->default(0);
			$table->boolean('is_referenced')->default(0);
			$table->boolean('is_hide_trading_options_list')->default(0);
			$table->boolean('is_watch_videos')->default(0);
			// $table->boolean('is_institutional')->default(0); DEPRECATED
			$table->boolean('is_active')->default(0);
			$table->string('new_entry_file', 255)->nullable();
			$table->string('edit_entry_file', 255)->nullable();
			$table->string('room_fields_file', 50)->nullable();
			$table->string('content_table', 50)->nullable();
			$table->string('html_add_comments', 255)->nullable();
			$table->string('alt_room_category', 255)->nullable();
			$table->string('alt_room_header', 255)->nullable();
			$table->text('example_email')->nullable();
			$table->text('example_sms')->nullable();
			$table->timestamps();
		});
		
		// CREATE Product & Section Pivot Table
		Schema::create('product_section', function($table) {
			$table->integer('product_id');
			$table->integer('section_id');
			$table->primary(['product_id', 'section_id']);
		});
		
		// Foreign Key Relationship with Website
		Schema::table('sections', function($table) {
			$table->foreign('website_id')
				->references('website_id')->on('websites')
				->onDelete('cascade');
		});
		
		// CREATE User & Section Pivot Table
		// This is for admin users what sections they have access to in Chum Admin
		Schema::create('admin_user_section_pivot', function($table) {
			$table->integer('user_id');
			$table->integer('section_id');
			$table->primary(['user_id', 'section_id']);
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
		Schema::dropIfExists('product_section');
    }
}
