<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('tensi')->default('');
            $table->string('gula_darah')->default('');
            $table->string('asam_urat')->default('');
            $table->string('kolesterol')->default('');
            $table->string('penyakit')->default('');
            $table->string('obat')->default('');
            $table->integer('jumlah')->default();
            $table->integer('booking_id')->default();
            $table->integer('user_id')->default();
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
        Schema::dropIfExists('rawat_jalans');
    }
}
