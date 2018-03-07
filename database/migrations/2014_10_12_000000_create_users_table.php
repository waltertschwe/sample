<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('user_id');
			// Foreign Keys
			$table->integer('website_id')->unsigned()->default(0);

			// New Field For Admin
			$table->boolean('is_admin')->default(0);

			// Fields
			$table->integer('old_user_id')->nullable();
			$table->string('firstname', 120);
			$table->string('lastname', 120);
			$table->string('email', 64);
			$table->string('password')->nullable();
			$table->string('alt_email', 64)->nullable();
			$table->string('chat_handle', 50)->nullable();
			$table->string('avatar', 100)->nullable();
			$table->integer('public_info')->default(0);
			$table->string('phone', 50)->nullable();
			$table->string('cell_number', 50)->nullable();
			$table->enum('user_level', ['Standard', 'Moderator', 'Administrator'])->default('Standard');
			$table->text('notes')->nullable();
			$table->string('heard_about', 200)->nullable();
			$table->boolean('no_contact')->default(0);
			$table->string('old_cc_last_four', 4)->nullable();
			$table->text('trading_room_options')->nullable();
			$table->integer('refer_user_id')->nullable();
			$table->boolean('is_duplicate')->default(0);
			$table->boolean('accepted_disclaimer')->default(0);
			$table->text('bio')->nullable();
			$table->string('business', 80)->nullable();
			$table->text('geo_ip')->nullable();
			$table->string('avatar_aws_bucket', 12)->nullable();
			$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
