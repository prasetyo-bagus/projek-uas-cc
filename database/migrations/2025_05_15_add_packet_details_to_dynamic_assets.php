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
        Schema::table('dynamic_assets', function (Blueprint $table) {
            $table->string('weekday_price')->nullable()->after('duration');
            $table->string('weekend_price')->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dynamic_assets', function (Blueprint $table) {
            $table->dropColumn([ 'weekday_price', 'weekend_price']);
        });
    }
}; 