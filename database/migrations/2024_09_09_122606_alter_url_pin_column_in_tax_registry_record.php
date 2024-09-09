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
        Schema::table('tax_registry_record', function (Blueprint $table) {
            $table->string('url_pin')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tax_registry_record', function (Blueprint $table) {
            $table->string('url_pin')->nullable(false)->change();
        });
    }
};
