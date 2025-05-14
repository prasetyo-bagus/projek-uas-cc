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
        // Mengubah enum type untuk menambahkan LAYANAN sebagai opsi
        DB::statement("ALTER TABLE dynamic_assets MODIFY COLUMN type ENUM('BANNER', 'GALERY', 'FACILITY', 'PACKET', 'SPONSOR', 'LAYANAN')");
        
        // Menambahkan kolom baru untuk layanan
        Schema::table('dynamic_assets', function (Blueprint $table) {
            if (!Schema::hasColumn('dynamic_assets', 'icon')) {
                $table->string('icon')->nullable()->after('description');
            }
            if (!Schema::hasColumn('dynamic_assets', 'service_items')) {
                $table->json('service_items')->nullable()->after('detail');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Mengembalikan enum type ke nilai semula
        DB::statement("ALTER TABLE dynamic_assets MODIFY COLUMN type ENUM('BANNER', 'GALERY', 'FACILITY', 'PACKET', 'SPONSOR')");
        
        // Menghapus kolom yang ditambahkan
        Schema::table('dynamic_assets', function (Blueprint $table) {
            if (Schema::hasColumn('dynamic_assets', 'icon')) {
                $table->dropColumn('icon');
            }
            if (Schema::hasColumn('dynamic_assets', 'service_items')) {
                $table->dropColumn('service_items');
            }
        });
    }
};
