<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoRekToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('nama_bank')->after('wa');
            $table->string('nama_rek')->after('nama_bank');
            $table->string('no_rek')->after('nama_rek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('nama_bank');
            $table->dropColumn('nama_rek');
            $table->dropColumn('no_rek');
        });
    }
}
