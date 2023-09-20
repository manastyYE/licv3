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
        Schema::create('org_billboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->foreign('org_id')->references('id')->on('orgs')->onDelete('restrict');
            $table->unsignedBigInteger('billboard_id');
            $table->foreign('billboard_id')->references('id')->on('billboards')->onDelete('restrict');
            $table->unsignedFloat('height');
            $table->unsignedFloat('width');
            $table->unsignedInteger('count')->default(1);
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
        Schema::dropIfExists('org_billboards');
    }
};
