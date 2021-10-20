<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertamertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertamertas', function (Blueprint $table) {
            $table->id();
            $table->string('ringkasan');
            $table->string('sumber');
            $table->string('telp');
            $table->string('kategori');
            $table->string('link')->nullable();
            $table->string('unduhan')->nullable();
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
        Schema::dropIfExists('sertamertas');
    }
}
