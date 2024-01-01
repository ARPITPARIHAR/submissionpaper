<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentTable extends Model
{
    protected $fillable = ['comment', 'processed', 'pdf', 'url', 'format_id'];

    protected $casts = [
        'submitted' => 'boolean',
    ];

    public function format()
    {
        return $this->belongsTo(Format::class, 'format_id', 'id');
    }
}

    


