<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hmms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('nilai');
            $table->string('nilai1');
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
        Schema::dropIfExists('hmms');
    }
}
