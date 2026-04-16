<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('portfolio_title')->nullable()->after('id');
            $table->string('main_heading')->nullable()->after('subtitle');
            $table->string('main_sub_heading')->nullable()->after('main_heading');
            $table->string('location')->nullable()->after('client_name');

            $table->longText('client_background')->nullable()->after('full_description');
            $table->longText('client_challenges')->nullable()->after('client_background');
            $table->longText('strategic_solutions')->nullable()->after('client_challenges');
            $table->longText('results_delivered')->nullable()->after('strategic_solutions');

            $table->string('youtube_video_link_1')->nullable()->after('results_delivered');
            $table->string('youtube_video_link_2')->nullable()->after('youtube_video_link_1');
            $table->string('meta_ads_title')->nullable()->after('youtube_video_link_2');
            $table->string('meta_ads_image')->nullable()->after('meta_ads_title');

            $table->string('ads_sample_image_1')->nullable()->after('meta_ads_image');
            $table->string('ads_sample_image_2')->nullable()->after('ads_sample_image_1');
            $table->string('ads_sample_image_3')->nullable()->after('ads_sample_image_2');

            $table->string('client_feedback_heading')->nullable()->after('ads_sample_image_3');
            $table->longText('client_feedback_text')->nullable()->after('client_feedback_heading');
            $table->string('client_feedback_name')->nullable()->after('client_feedback_text');
            $table->string('client_feedback_designation')->nullable()->after('client_feedback_name');

            $table->string('feedback_image_1')->nullable()->after('client_feedback_designation');
            $table->string('feedback_image_2')->nullable()->after('feedback_image_1');
            $table->string('feedback_image_3')->nullable()->after('feedback_image_2');
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'portfolio_title',
                'main_heading',
                'main_sub_heading',
                'location',
                'client_background',
                'client_challenges',
                'strategic_solutions',
                'results_delivered',
                'youtube_video_link_1',
                'youtube_video_link_2',
                'meta_ads_title',
                'meta_ads_image',
                'ads_sample_image_1',
                'ads_sample_image_2',
                'ads_sample_image_3',
                'client_feedback_heading',
                'client_feedback_text',
                'client_feedback_name',
                'client_feedback_designation',
                'feedback_image_1',
                'feedback_image_2',
                'feedback_image_3',
            ]);
        });
    }
};