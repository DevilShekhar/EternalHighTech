<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            // Assign to sales person
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Basic lead info
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Business + service info
            $table->string('services')->nullable();
            $table->string('business_name')->nullable();

            // Message
            $table->text('message')->nullable();

            // Tracking
            $table->ipAddress('ip_address')->nullable();

            // Auto location (filled via API, not manually)
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();

            // Optional GPS
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};