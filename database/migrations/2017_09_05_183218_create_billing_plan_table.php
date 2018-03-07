<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('billing_plans', function (Blueprint $table) {
			// Primary Key
			$table->increments('billing_plan_id');

			// Foreign Keys
			$table->integer('product_id')->nullable()->unsigned();
			$table->integer('promotion_id')->nullable()->unsigned();
			
			// Fields
			$table->integer('old_billing_id')->nullable();
			$table->string('name', 60)->nullable();
			$table->decimal('price', 11, 2)->default(0.00);
			$table->decimal('first_month_price', 11, 2)->nullable();
			$table->string('description', 255)->nullable();
			$table->integer('free_trial_days')->default(15);
			$table->string('periodicity')->nullable();
			$table->integer('extend_free_trial_days')->nullable();
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
		Schema::dropIfExists('billing_plan');
	}
}
