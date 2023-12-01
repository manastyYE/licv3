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
        Schema::create('additional_pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outher_bayment_id');
            $table->foreign('outher_bayment_id')->references('id')->on('outher_bayments')->onDelete('restrict');
            $table->unsignedBigInteger('amount');
            $table->string('dtl');
            $table->unsignedBigInteger('org_id');
            $table->foreign('org_id')->references('id')->on('orgs')->onDelete('restrict');
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
        Schema::dropIfExists('additional_pays');
    }
};
