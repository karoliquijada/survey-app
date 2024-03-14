<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\UserSurveyCompleted;

class AnswerController extends Controller
{
    public function store(Request $request, $survey_id)
    {
        $userId = Auth::id();
        $answers = $request->input('answers');

        $validatedData = $request->validate([
            'answers.*' => 'required', // Todas las respuestas son requeridas
        ]);
    
        foreach ($answers as $questionId => $answerValue) {
            Answer::create([
                'question_id' => $questionId,
                'user_id' => $userId,
                'value' => $answerValue,
            ]);
        }

        UserSurveyCompleted::create([
            'user_id' => $userId,
            'survey_id' => $survey_id,
            'completed_at' => now(),
        ]);
    
        return redirect()->route('thankyou');
    }
}
