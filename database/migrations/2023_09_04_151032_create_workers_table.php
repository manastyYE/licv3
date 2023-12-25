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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('phone');
            $table->string('password');
            $table->unsignedBigInteger('directorate_id');
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('restrict');
            $table->unsignedBigInteger('supervisor_id')->nullable();
            // $table->unsignedBigInteger('hood_id');
            // $table->foreign('hood_id')->references('id')->on('hoods')->onDelete('restrict');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('restrict');
            $table->string('hood_units');
            $table->tinyInteger('role_no')->default(1)->comment("(1 = مفتش)(2 = مشرف)");
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
        Schema::dropIfExists('workers');
    }
};
