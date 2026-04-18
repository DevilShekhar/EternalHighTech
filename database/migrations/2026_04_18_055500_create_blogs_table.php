<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();
            $table->string('heading_image')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('company_name')->nullable();

            $table->longText('description')->nullable();
            $table->text('tags')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();

            $table->enum('status', ['Active', 'Inactive'])->default('Active');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};