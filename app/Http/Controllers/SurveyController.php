<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Inertia\Inertia;


class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        
        return Inertia::render('Survey', [
            'surveys' => $surveys,
        ]);
    }

    public function show($id)
    {
        $survey = Survey::with('questions')->findOrFail($id);
        
        return Inertia::render('SurveyShow', [
            'survey' => $survey,
        ]);
    }    
}
