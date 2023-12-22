<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $fillable = ['journal_name', 'title', 'file_content', 'status', 'pdf', 'url'];

    public function comments()
    {
        return $this->hasMany(CommentTable::class, 'format_id', 'id');
    }
}
