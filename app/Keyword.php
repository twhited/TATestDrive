<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    function question()
    {
        return $this->belongsTo(Question::class);
    }
}
