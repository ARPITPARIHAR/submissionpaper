<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTablesTable extends Migration
{
    public function up()
    {
        Schema::create('comment_tables', function (Blueprint $table) {
            // Your existing columns...

            // Add this line to create the foreign key constraint
            $table->foreignId('format_id')->constrained('formats');

            // Timestamps...
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment_tables');
    }
};

