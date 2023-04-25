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
            $table->dropColumn('status');
            $table->enum('payment_status', ['1','2','3'])->nullable()->after(('total_price'));
            $table->enum('order_status', ['1','2','3'])->nullable()->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->enum('status', ['1','2','3','4','5'])->nullable()->after('total_price');
            $table->dropColumn('payment_status');
            $table->dropColumn('order_status');
        });
    }
};
