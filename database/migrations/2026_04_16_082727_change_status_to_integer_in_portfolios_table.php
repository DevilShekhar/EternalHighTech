<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('portfolios')->where('status', 'active')->update(['status' => 1]);
        DB::table('portfolios')->where('status', 'inactive')->update(['status' => 0]);

        Schema::table('portfolios', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->change();
        });
    }

    public function down(): void
    {
        DB::table('portfolios')->where('status', 1)->update(['status' => 'active']);
        DB::table('portfolios')->where('status', 0)->update(['status' => 'inactive']);

        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('status')->default('active')->change();
        });
    }
};