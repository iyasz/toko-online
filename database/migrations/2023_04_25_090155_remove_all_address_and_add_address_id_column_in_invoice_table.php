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
        Schema::table('invoice', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('telp');
            $table->dropColumn('city_id');
            $table->dropColumn('zipcode');
            $table->dropColumn('alamat');
            $table->unsignedBigInteger('address_id')->nullable()->after('invoice_code');
            $table->foreign('address_id')->references('id')->on('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');
            $table->string('name')->nullable()->after('invoice_code');
            $table->string('telp')->nullable()->after('name');
            $table->string('city_id')->nullable()->after('telp');
            $table->string('zipcode')->nullable()->after('city_id');
            $table->text('alamat')->nullable()->after('zipcode');
        });
    }
};
