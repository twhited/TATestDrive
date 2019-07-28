<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['value'];
    function question()
    {
        return $this->belongsTo(Question::class);
    }
}
