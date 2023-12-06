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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('username');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('hood_units')->nullable();
            $table->unsignedBigInteger('directorate_id');
            $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('restrict');
            $table->unsignedBigInteger('hood_id')->nullable();
            $table->foreign('hood_id')->references('id')->on('hoods')->onDelete('restrict');

            $table->tinyInteger('roll')->comment('(1 مدير المديرية)(2 مدير الصندوق)(3 موظف)')->default(3);

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
        Schema::dropIfExists('users');
    }
};
