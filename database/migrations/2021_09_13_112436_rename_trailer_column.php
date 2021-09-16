<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTrailerColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trailer', function (Blueprint $table) {
            $table->renameColumn('length', 'fleetnumber');
            $table->renameColumn('wagen', 'merk');
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
            
            $table->renameColumn('merk', 'wagen');
            $table->renameColumn('fleetnumber', 'length');
    });
    }
}
