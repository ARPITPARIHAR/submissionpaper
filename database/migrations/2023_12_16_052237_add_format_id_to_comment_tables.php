use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormatIdToCommentTables extends Migration
{
    public function up()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->foreignId('format_id')->constrained('formats');
        });
    }

    public function down()
    {
        Schema::table('comment_tables', function (Blueprint $table) {
            $table->dropForeign(['format_id']);
            $table->dropColumn('format_id');
        });
    }
}
