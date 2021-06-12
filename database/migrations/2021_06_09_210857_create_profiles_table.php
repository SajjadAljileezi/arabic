<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('userid') ;
            $table->string('name') ;
            $table->string('address');
            $table->string('country') ;
            $table->string('city');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('card_type')->nullable();
            $table->bigInteger('card_number')->nullable();
            $table->string('name_card')->nullable();
            $table->string('card_address')->nullable();
            $table->string('card_city')->nullable();
            $table->string('card_country')->nullable();
            $table->string('card_zip')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
