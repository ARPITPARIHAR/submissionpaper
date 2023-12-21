<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('format_id')->nullable();
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('set null');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            //
        });
    }
};
