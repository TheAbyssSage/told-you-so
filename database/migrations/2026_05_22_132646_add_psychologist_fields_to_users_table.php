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
            $table->boolean('is_psychologist')->default(false)->after('is_admin');
            $table->foreignId('psychologist_id')->nullable()->after('is_psychologist')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['psychologist_id']);
            $table->dropColumn(['psychologist_id', 'is_psychologist']);
        });
    }
};
