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
        Schema::create('acc_oprations', function (Blueprint $table) {
            $table->id();
            $table->string('opt_num')->unique()->commen('رقم العملية');
            $table->string('clip_num')->comment('رقم الحافظة')->nullable();
            $table->integer('depit')->default(0)->comment('مدين');
            $table->integer('creidt')->default(0)->comment('دائن');
            $table->unsignedBigInteger('acc_num')->comment('رقم الحساب');
            $table->string('acc_name')->comment('اسم الحساب');
            $table->tinyInteger('opt_type')->comment('نوع العملية');
            $table->string('acc_year');
            $table->string('info',1200);
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
        Schema::dropIfExists('acc_oprations');
    }
};
