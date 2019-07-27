<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question_text', 'display_text', 'required', 'type'];
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
}
