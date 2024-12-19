<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $table = 'formats';

    protected $fillable = ['journal_name', 'title', 'file_content', 'status', 'pdf', 'url', 'user_id'];



    
    public function comments()
    {
        return $this->hasMany(CommentTable::class, 'format_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
}