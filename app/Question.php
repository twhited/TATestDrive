<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
}
