<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTrailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trailer', function (Blueprint $table) {
            
            $table->date('date_of_firstadmission')->nullable();
            $table->longText('document')->nullable();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trailer', function (Blueprint $table) {
          
            $table->dropColumn('date_of_firstadmission');
            $table->dropColumn('document');
        });
    }
}
