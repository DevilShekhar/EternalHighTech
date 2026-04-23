<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: new temporary numeric column add
        Schema::table('blogs', function (Blueprint $table) {
            $table->tinyInteger('new_status')->default(1)->after('status');
        });

        // Step 2: old string status -> new numeric status
        DB::table('blogs')->where('status', 'Active')->update(['new_status' => 1]);
        DB::table('blogs')->where('status', 'Inactive')->update(['new_status' => 0]);

        // Step 3: old status column remove
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Step 4: new_status rename to status
        Schema::table('blogs', function (Blueprint $table) {
            $table->renameColumn('new_status', 'status');
        });
    }

    public function down(): void
    {
        // Step 1: old string column add again
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('old_status')->default('Active')->after('status');
        });

        // Step 2: numeric status -> string status
        DB::table('blogs')->where('status', 1)->update(['old_status' => 'Active']);
        DB::table('blogs')->where('status', 0)->update(['old_status' => 'Inactive']);

        // Step 3: remove numeric status
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Step 4: rename old_status to status
        Schema::table('blogs', function (Blueprint $table) {
            $table->renameColumn('old_status', 'status');
        });
    }
};