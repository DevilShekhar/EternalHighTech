<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('status')->default('Active');

            $table->string('sec_one_image')->nullable();
            $table->string('sec_one_heading')->nullable();
            $table->longText('sec_one_description')->nullable();

            $table->string('sec_two_image')->nullable();
            $table->string('sec_two_heading')->nullable();
            $table->string('sec_two_sub_heading')->nullable();
            $table->longText('sec_two_description')->nullable();

            $table->string('sec_three_image')->nullable();
            $table->string('sec_three_heading')->nullable();
            $table->longText('sec_three_description')->nullable();

            $table->string('sec_four_image')->nullable();
            $table->string('sec_four_heading')->nullable();
            $table->longText('sec_four_description')->nullable();

            $table->string('sec_five_image')->nullable();
            $table->string('sec_five_heading')->nullable();
            $table->longText('sec_five_description')->nullable();

            $table->string('sec_six_image')->nullable();
            $table->string('sec_six_heading')->nullable();
            $table->longText('sec_six_description')->nullable();

            $table->string('sec_seven_image')->nullable();
            $table->string('sec_seven_heading')->nullable();
            $table->longText('sec_seven_description')->nullable();

            $table->string('sec_eight_image')->nullable();
            $table->string('sec_eight_heading')->nullable();
            $table->longText('sec_eight_description')->nullable();

            $table->string('sec_nine_image')->nullable();
            $table->string('sec_nine_heading')->nullable();
            $table->longText('sec_nine_description')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};