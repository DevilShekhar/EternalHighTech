<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'portfolio_title',
                'subtitle',
                'client_name',
                'location',
                'industry',
                'service_type',
                'short_description',
                'full_description',
                'client_challenges',
                'strategic_solutions',
                'ads_sample_image_1',
                'ads_sample_image_2',
                'ads_sample_image_3',
                'client_feedback_designation',
                'feedback_image_2',
                'feedback_image_3',
                'results_text',
                'website_url',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('portfolio_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('client_name')->nullable();
            $table->string('location')->nullable();
            $table->string('industry')->nullable();
            $table->string('service_type')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('client_challenges')->nullable();
            $table->longText('strategic_solutions')->nullable();
            $table->string('ads_sample_image_1')->nullable();
            $table->string('ads_sample_image_2')->nullable();
            $table->string('ads_sample_image_3')->nullable();
            $table->string('client_feedback_designation')->nullable();
            $table->string('feedback_image_2')->nullable();
            $table->string('feedback_image_3')->nullable();
            $table->text('results_text')->nullable();
            $table->string('website_url')->nullable();
        });
    }
};