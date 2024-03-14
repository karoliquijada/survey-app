<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSurveyCompleted extends Model
{

    protected $table = 'user_survey_completed';
    protected $fillable = [
        'user_id',
        'survey_id',
        'completed_at',
    ];

    protected $dates = [
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
