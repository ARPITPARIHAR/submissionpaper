<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProceedColorToCommentTables extends Migration
{
    public function up()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->string('proceed_color')->default('white')->after('url');
        });
    }

    public function down()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->dropColumn('proceed_color');
        });
    }
}
