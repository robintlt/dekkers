<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDropOffAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drop_off_addresses', function (Blueprint $table) {
            
            $table->string('land')->nullable();
			$table->string('url')->nullable();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drop_off_addresses', function (Blueprint $table) {
            $table->dropColumn('land');
            $table->dropColumn('url');
        });
    }
}
