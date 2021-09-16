<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loading_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('bedrijfsnaam')->nullable();
			$table->longText('address')->nullable();
			$table->string('postcode')->nullable();
            $table->string('city')->nullable();
			$table->longText('description')->nullable();
            $table->longText('document')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loading_addresses');
    }
}
