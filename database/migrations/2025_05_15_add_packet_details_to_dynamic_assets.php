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
            $table->string('capacity')->nullable()->after('detail');
            $table->string('duration')->nullable()->after('capacity');
            $table->string('price')->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dynamic_assets', function (Blueprint $table) {
            $table->dropColumn(['capacity', 'duration', 'price']);
        });
    }
}; 