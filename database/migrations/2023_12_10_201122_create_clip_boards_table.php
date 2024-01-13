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
        Schema::create('clip_boards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('org_id');
            $table->foreign('org_id')->references('id')->on('orgs')->onDelete('restrict');
            $table->unsignedBigInteger('total_ad')->nullable()->comment('اجمالي رسوم الدعاية والاعلان');
            $table->unsignedBigInteger('clean_pay')->nullable()->comment('اجمالي ؤسوم نظافة المهن');
            $table->unsignedBigInteger('local_fee')->nullable()->comment('اجمالي الرسوم المحلية');
            $table->unsignedBigInteger('el_gate')->nullable()->comment('رسوم البوابة الالكترونية');
            $table->string('ad_reseve')->nullable()->comment('رقم سند الدعاية والاعلان');
            $table->string('clean_reseve')->nullable()->comment('رقم سند رسوم نظافة المهن');
            $table->string('local_reseve')->nullable()->comment('رقم سند الرسوم المحلية');
            $table->string('el_gate_reseve')->nullable()->comment('رقم سند رسوم البوابة الالكترونية');
            $table->string('ad_reseve_date')->nullable()->comment('تاريخ سند رسوم الدعاية والاعلان');
            $table->string('clean_reseve_date')->nullable()->comment('تاريخ سند رسوم نظافة المهن');
            $table->string('local_reseve_date')->nullable()->comment('تاريخ سند الرسوم المحلية');
            $table->string('el_gate_reseve_date')->nullable()->comment('تاريخ سند رسوم البوابة الالكترونية');
            $table->string('ad_reseve_note')->nullable()->comment('ملاحظة رسوم الدعاية والاعلان');
            $table->string('clean_reseve_note')->nullable()->comment('ملاحظة رسوم نظافة المهن');
            $table->string('local_reseve_note')->nullable()->comment('ملاحظة الرسوم المحلية');
            $table->string('el_gate_reseve_note')->nullable()->comment('ملاحظة رسوم البوابة الالكترونية');
            $table->unsignedBigInteger('directorate_id');
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('restrict');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('restrict');
            $table->unsignedBigInteger('edit_admin_id');
            $table->foreign('edit_admin_id')->references('id')->on('admins')->onDelete('restrict');
            $table->dateTime('deleted_at')->nullable();
            $table->string('clip_status')->default('غير مدفوعة');
            $table->unsignedDouble('infront_count')->nullable()->comment('عدد الامتار في اللوحة الامامية');
            $table->unsignedDouble('sideof_count')->nullable()->comment('عدد الامتار للوحات الجانبية');
            $table->unsignedDouble('roof_count')->nullable()->comment('عدد الامتار للوحات السطحية');
            $table->unsignedDouble('wall_count')->nullable()->comment('عدد الامتار للوحات الجدارية');
            $table->unsignedDouble('glass_stickers')->nullable()->comment('عدد الامتار للواصق على الزجاج');
            $table->unsignedDouble('door_stickers')->nullable()->comment('عدد الامتار للواصق على الابواب ');
            $table->unsignedBigInteger('clean');
            $table->double('year_count');
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
        Schema::dropIfExists('clip_boards');
    }
};
