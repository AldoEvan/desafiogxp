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
        Schema::create('documento_csv', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('desc');
            $table->integer('unit');
            $table->float('price', 8,2);
            $table->date('date');
            $table->integer('staff');
            $table->softDeletes();
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
        Schema::dropIfExists('documento_cvs');
    }
};
