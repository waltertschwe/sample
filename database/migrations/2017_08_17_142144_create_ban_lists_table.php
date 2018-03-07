<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_banlist', function (Blueprint $table) {
            $table->increments('ban_id');
			$table->string('emailAddress', 64)->nullable();
			$table->string('ipAddress', 64)->nullable();
			$table->string('cc_number', 50)->nullable();
			$table->string('address', 100)->nullable();
			$table->string('firstname', 60)->nullable();
			$table->string('lastname', 60)->nullable();
			$table->text('notes')->nullable();
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
        Schema::dropIfExists('admin_banlist');
    }
}
