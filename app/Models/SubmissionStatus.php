<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionStatus extends Model
{
    protected $table = 'submission_status';

   
    public function commentTable()
    {
        return $this->belongsTo(CommentTable::class, 'comment_id', 'id');
    }
}