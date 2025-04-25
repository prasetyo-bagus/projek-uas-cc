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
        Schema::create('dynamic_assets', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['BANNER', 'GALERY', 'FACILITY', 'PACKET']);
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('description')->nullable();
            $table->text('detail')->nullable();
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
