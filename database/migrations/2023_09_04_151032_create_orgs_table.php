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
        Schema::create('orgs', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_img');
            $table->unsignedBigInteger('org_type_id');
            $table->foreign('org_type_id')->references('id')->on('org_types')->onDelete('restrict');
            $table->date('start_date');
            $table->unsignedBigInteger('building_type_id');
            $table->foreign('building_type_id')->references('id')->on('building_types')->onDelete('restrict');
            $table->string('card_type');
            $table->string('card_number');
            $table->string('isowner',20);
            $table->unsignedBigInteger('hood_unit_id');
            $table->foreign('hood_unit_id')->references('id')->on('hood_units')->onDelete('restrict');
            $table->unsignedBigInteger('street_id');
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('restrict');
            $table->string('personal_card')->nullable()->comment('صورة البطاقة الشخصية');
            $table->string('rent_contract')->nullable()->comment('صورة عقد الايجار اوفاتورة الكهرباء او الماء في حالة كان المالك');
            $table->string('ad_board')->nullable()->comment('صورة اللوحة الاعلانية');
            $table->string('previous_license')->nullable()->comment('الرخصة السابقة');
            $table->string('comm_record')->nullable()->comment('السجل التجاي');
            $table->string('outher')->nullable()->comment('موافقة الجهة المختصة');
            $table->unsignedBigInteger('parcode')->nullable();
            $table->string('addrees')->nullable();
            $table->string('aire_drow')->nullable();
            $table->string('fire_ext',20)->default('لا');
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
        Schema::dropIfExists('orgs');
    }
};
