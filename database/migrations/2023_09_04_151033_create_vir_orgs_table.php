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
        Schema::create('vir_orgs', function (Blueprint $table) {
            $table->id();
            $table->string('org_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
            $table->unsignedBigInteger('org_type_id');
            $table->foreign('org_type_id')->references('id')->on('org_types')->onDelete('restrict');
            $table->unsignedBigInteger('street_id');
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('restrict');
            $table->unsignedBigInteger('hood_unit_id');
            $table->foreign('hood_unit_id')->references('id')->on('hood_units')->onDelete('restrict');
            $table->text('note')->nullable();//الملاحظة
            $table->string('log_x')->nullable();
            $table->string('log_y')->nullable();
            $table->string('org_image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('workers')->onDelete('restrict');
            $table->boolean('is_moved')->default(false);//هل تم النقل الى جدول المنشئات
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
        Schema::dropIfExists('vir_orgs');
    }
};
