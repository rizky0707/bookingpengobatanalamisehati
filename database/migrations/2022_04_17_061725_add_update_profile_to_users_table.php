<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdateProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_rm')->after('id');
            $table->string('nik')->default('')->after('no_rm');
            $table->string('no_hp')->default('')->after('is_admin');
            $table->string('jenis_kelamin')->default('')->enum(['L', 'P'])->after('no_hp');
            $table->string('tempat')->default('')->after('jenis_kelamin');
            $table->string('tanggal_lahir')->default('')->after('tempat');
            $table->string('alamat')->default('')->after('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no_rm');
            $table->dropColumn('nik');
            $table->dropColumn('no_hp');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('tempat');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('alamat');
        });
    }
}
