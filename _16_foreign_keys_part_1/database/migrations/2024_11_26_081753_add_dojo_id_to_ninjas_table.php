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
        Schema::table('ninjas', function (Blueprint $table) {
            $table->foreignId('dojo_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ninjas', function (Blueprint $table) {
            $table->dropColumn('dojo_id'); // Remove the 'weapon' column
        });
    }
};
