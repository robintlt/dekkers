<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateChauffeurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chauffeur', function (Blueprint $table) {
            
			$table->string('postalcode')->nullable();
            $table->string('emergencynumber')->nullable();
            $table->string('city')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chauffeur', function (Blueprint $table) {
            $table->dropColumn('postalcode');
            $table->dropColumn('emergencynumber');
            $table->dropColumn('city');
        });
    }
}
