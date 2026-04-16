<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->renameColumn('main_heading', 'heading');
            $table->renameColumn('main_sub_heading', 'sub_heading');
            $table->renameColumn('client_background', 'description');
            $table->renameColumn('youtube_video_link_1', 'link_one');
            $table->renameColumn('youtube_video_link_2', 'link_two');

            $table->renameColumn('featured_image', 'image');
            $table->renameColumn('meta_ads_image', 'performance_image');
            $table->renameColumn('feedback_image_1', 'feedback_image');

            $table->renameColumn('client_feedback_heading', 'feedback_heading');
            $table->renameColumn('client_feedback_text', 'feedback_description');
            $table->renameColumn('client_feedback_name', 'client_name');
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->boolean('is_featured')->default(0);
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->renameColumn('heading', 'main_heading');
            $table->renameColumn('sub_heading', 'main_sub_heading');
            $table->renameColumn('description', 'client_background');
            $table->renameColumn('link_one', 'youtube_video_link_1');
            $table->renameColumn('link_two', 'youtube_video_link_2');

            $table->renameColumn('image', 'featured_image');
            $table->renameColumn('performance_image', 'meta_ads_image');
            $table->renameColumn('feedback_image', 'feedback_image_1');

            $table->renameColumn('feedback_heading', 'client_feedback_heading');
            $table->renameColumn('feedback_description', 'client_feedback_text');
            $table->renameColumn('client_name', 'client_feedback_name');
        });
    }
};