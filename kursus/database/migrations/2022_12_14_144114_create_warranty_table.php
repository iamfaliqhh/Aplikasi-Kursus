<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('status')->default('unclaimed');
            $table->string('nama')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('email')->nullable();
            $table->string('handphone')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tipe')->nullable();
            $table->string('nomor_rangka');
            $table->string('nomor_plat');
            $table->string('front_window');
            $table->string('back_window');
            $table->string('side_window');
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
        Schema::dropIfExists('warranty');
    }
}
