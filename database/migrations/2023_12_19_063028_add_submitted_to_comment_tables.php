<?php

// database/migrations/YYYY_MM_DD_HHMMSS_add_submitted_to_comment_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubmittedToCommentTables extends Migration
{
    public function up()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->boolean('submitted')->default(false);
        });
    }

    public function down()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->dropColumn('submitted');
        });
    }
}
