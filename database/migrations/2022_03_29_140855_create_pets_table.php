<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('petName');
            $table->string('petType');
            $table->string('ownerName');
            $table->string('image');
            $table->string('description');
            $table->string('breed')->nullable();
            $table->date("startDate");
            $table->date('endDate');
            $table->integer('payment');
            $table->string('important')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
