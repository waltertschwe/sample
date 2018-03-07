<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailNotificationGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::create('email_notification_groups', function (Blueprint $table) {
			$table->increments('email_notification_id');
			
			// foreign keys
			$table->integer('website_id')->unsigned();
			$table->integer('product_id')->unsigned();
			
			// fields
			$table->integer('sort_order')->default(0);
			$table->string('group_name', 255)->nullable();
			$table->string('category_name', 255)->nullable();
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
        Schema::dropIfExists('email_notification_groups');
    }
}
