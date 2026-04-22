<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lead_followups', function (Blueprint $table) {
            $table->dateTime('next_followup_date')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('lead_followups', function (Blueprint $table) {
            $table->date('next_followup_date')->nullable()->change();
        });
    }
};