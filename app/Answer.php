<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id','value'];
    function question()
    {
        return $this->belongsTo(Question::class);
    }
}
