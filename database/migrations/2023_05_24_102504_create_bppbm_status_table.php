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
        Schema::create('bppbm_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bppbm_id')->constrained('bppbm')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('status_bppbm_awal');
            $table->integer('status_bppbm_akhir');
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
        Schema::dropIfExists('bppbm_status');
    }
};
