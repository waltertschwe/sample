<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
			$table->increments('admin_user_id');
			$table->string('fullname', 60);
			$table->string('email', 60);
			$table->string('username', 50);
			$table->string('password', 255);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
		
		// CREATE Admin Users and Website pivot table
		Schema::create('website_admin_users_pivot', function($table) {
			$table->integer('website_id');
			$table->integer('admin_user_id');
			$table->primary(['website_id', 'admin_user_id']);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
