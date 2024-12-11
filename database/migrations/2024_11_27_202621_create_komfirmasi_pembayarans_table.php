<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomfirmasiPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komfirmasi_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->string('nomor_rekening_pengirim');
            $table->string('bukti_pembayaran');
            $table->integer('user_id');
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
        Schema::dropIfExists('komfirmasi_pembayarans');
    }
}
