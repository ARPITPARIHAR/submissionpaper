<?php

// Format.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
   

    public function comment()
    {
        return $this->hasOne(CommentTable::class, 'format_id', 'id');
    }
}

