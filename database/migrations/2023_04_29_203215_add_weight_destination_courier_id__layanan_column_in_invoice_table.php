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
            $table->string('weight')->nullable()->after('invoice_code');
            $table->string('destination_id')->nullable()->after('weight');
            $table->string('courier_id')->nullable()->after('destination_id');
            $table->string('layanan')->nullable()->after('courier_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->dropColumn('weight');
            $table->dropColumn('destination_id');
            $table->dropColumn('courier_id');
            $table->dropColumn('layanan');
        });
    }
};
