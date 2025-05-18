<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dynamic_assets', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['BANNER', 'GALERY', 'FACILITY', 'PACKET', 'SPONSOR', 'LAYANAN']);
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('description')->nullable();
            $table->string('icon')->nullable();
            $table->longText('detail')->nullable();
            $table->boolean('is_active')->default(true);
            $table->json('service_items')->nullable();
            $table->string('weekday_price')->nullable();
            $table->string('weekend_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_assets');
    }
};