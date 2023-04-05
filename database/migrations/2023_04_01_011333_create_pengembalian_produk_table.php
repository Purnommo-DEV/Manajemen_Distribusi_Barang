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
        Schema::create('pengembalian_produk', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pesanan_id')->constrained('pesanan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('produk_id')->constrained('produk')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kuantitas');
            $table->string('subtotal');
            $table->text('keterangan');
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
        Schema::dropIfExists('pengembalian_produk');
    }
};
