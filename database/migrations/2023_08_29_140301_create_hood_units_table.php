<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hood_units', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->unsignedBigInteger('hood_id');
            $table->foreign('hood_id')->references('id')->on('hoods')->onDelete('restrict');
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
        Schema::dropIfExists('hood_units');
    }
};
