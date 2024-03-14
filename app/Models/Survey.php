<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Question::class);
    }
}
