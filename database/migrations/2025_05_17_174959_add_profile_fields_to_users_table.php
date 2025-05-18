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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->date('birthdate')->nullable()->after('phone');
            $table->enum('gender', ['L', 'P'])->nullable()->after('birthdate');
            $table->string('position')->nullable()->after('gender');
            $table->text('address')->nullable()->after('position');
            $table->text('bio')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'birthdate',
                'gender',
                'position',
                'address',
                'bio'
            ]);
        });
    }
};
