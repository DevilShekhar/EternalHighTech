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
        Schema::table('lead_followups', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('status');
            $table->string('alt_mobile')->nullable()->after('business_name');
            $table->text('short_desc')->nullable()->after('alt_mobile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_followups', function (Blueprint $table) {
           $table->dropColumn(['business_name', 'alt_mobile', 'short_desc']);
        });
    }
};
