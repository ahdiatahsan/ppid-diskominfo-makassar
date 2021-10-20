<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkalas', function (Blueprint $table) {
            $table->id();
            $table->string('ringkasan');
            $table->string('unit');
            $table->string('penanggungjawab');
            $table->string('jangka');
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
        Schema::dropIfExists('berkalas');
    }
}
