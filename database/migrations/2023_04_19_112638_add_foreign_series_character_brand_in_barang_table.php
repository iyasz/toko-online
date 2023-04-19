<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->unsignedBigInteger('series_id')->nullable()->after('stok');
            $table->foreign('series_id')->references('id')->on('series');
            $table->unsignedBigInteger('character_id')->nullable()->after('series_id');
            $table->foreign('character_id')->references('id')->on('character');
            $table->unsignedBigInteger('brand_id')->nullable()->after('character_id');
            $table->foreign('brand_id')->references('id')->on('brand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropForeign(['character_id']);
            $table->dropForeign(['series_id']);
            $table->dropForeign(['brand_id']);
            $table->dropColumn('character_id');
            $table->dropColumn('series_id');
            $table->dropColumn('brand_id');
        });
    }
};
