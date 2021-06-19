<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archiefs', function (Blueprint $table) {
            $table->id();
            $table->string('size')->nullable();
            $table->string('userid');
            $table->string('tracking')->nullable();
            $table->string('company')->nullable();
            $table->integer('weight');
            $table->integer('height');
            $table->integer('length');
            $table->integer('width');
            $table->integer('arrived')->nullable();
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
        Schema::dropIfExists('archiefs');
    }
}
