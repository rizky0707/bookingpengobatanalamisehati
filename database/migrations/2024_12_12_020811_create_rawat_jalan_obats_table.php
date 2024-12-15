<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatJalanObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_jalan_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rawat_jalan_diagnosa_id');
            $table->unsignedBigInteger('obat_id');
            $table->integer('jumlah');
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('rawat_jalan_diagnosa_id')->references('id')->on('rawat_jalan_diagnosa')->onDelete('cascade');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawat_jalan_obats');
    }
}
