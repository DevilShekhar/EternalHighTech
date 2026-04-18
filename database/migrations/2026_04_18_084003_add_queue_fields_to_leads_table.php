<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->integer('current_user_index')->default(0);
            $table->timestamp('notified_at')->nullable();
            $table->string('status')->default('pending'); // pending / assigned
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['current_user_index', 'notified_at', 'status']);
        });
    }
};