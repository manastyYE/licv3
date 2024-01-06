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
        Schema::create('outher_clips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->foreign('org_id')->references('id')->on('orgs')->onDelete('cascade' );
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('clip_status')->default('غير مدفوعة');
            $table->unsignedBigInteger('price')->nullable();
            $table->string('reseve')->nullable();
            $table->string('reseve_date')->nullable();
            $table->string('erseve_note')->nullable();
            $table->unsignedBigInteger('other_price')->default(0);
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
        Schema::dropIfExists('outher_clips');
    }
};
