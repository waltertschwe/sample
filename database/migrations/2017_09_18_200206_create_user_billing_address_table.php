<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBillingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('user_billing_address', function (Blueprint $table) {
			$table->increments('user_bill_address_id');
			
			// Foreign Keys
			$table->integer('user_id')->unsigned();
			
			//Fields
			$table->integer('old_user_billing_id')->nullable();
			$table->boolean('is_active')->default(1);
			$table->string('address', 120)->nullable();
			$table->string('address_2', 120)->nullable();
			$table->string('city', 120)->nullable();
			$table->string('state', 90)->nullable();
			$table->string('zip', 60)->nullable();
			$table->string('country', 90)->nullable();
			$table->string('cc_last_four', 4)->nullable();
			$table->mediumText('geo_ip')->nullable();
			$table->timestamps();
        });
		
		// Foreign Key Relationships
		Schema::table('user_billing_address', function($table) {
			$table->foreign('user_id')
				->references('user_id')->on('users')
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
        Schema::dropIfExists('user_billings');
    }
}
