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
        Schema::create('comment_table', function (Blueprint $table) {
            $table->id();

            // Assuming 'item_id' is a foreign key referencing your main table
            $table->foreignId('item_id')->constrained('your_main_table')->onDelete('cascade');
            
            $table->text('comment')->nullable();
            $table->enum('processed', ['published', 'pending'])->default('pending');
            
            
            $table->string('pdf_name');
            $table->string('url_name');
            
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_table');
    }
};

    

