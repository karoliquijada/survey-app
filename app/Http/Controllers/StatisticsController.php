<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Inertia\Inertia;

class StatisticsController extends Controller
{
    public function index()
    {

        $questionAverages = [];

        // Obtener todas las preguntas
        $questions = Question::all();

        foreach ($questions as $question) {
            // Calcular el promedio de respuestas para cada pregunta
            $average = Answer::where('question_id', $question->id)
                ->avg('value');

            // Agregar el promedio al array de resultados
            $questionAverages[] = $average;
        }

        return Inertia::render('Statistics', [
            'average' => $questionAverages,
        ]);
    }
}
