<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Survey;
use App\Models\Question;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the survey
        $survey = Survey::create([
            'title' => 'Shingeki no Kyojin Character Survey',
            'description' => 'Survey about characters from Shingeki no Kyojin (Attack on Titan)',
            'created_by_user_id' => 1, // I'm using 1 by default ID because I do not have a CRUD yet.
        ]);

        // Create 10 questions for the survey
        $questions = [
            "How brave do you consider yourself compared to Eren Jaeger?",
            "How loyal do you feel towards the Survey Corps like Mikasa Ackerman?",
            "How determined are you to achieve your goals like Levi Ackerman?",
            "How compassionate are you towards your comrades like Armin Arlert?",
            "How strategic are you in difficult situations like Hange Zoë?",
            "How confident are you in your leadership skills like Erwin Smith?",
            "How dedicated are you to protecting your loved ones like Historia Reiss?",
            "How willing are you to sacrifice your own safety for the sake of humanity like Jean Kirstein?",
            "How determined are you to uncover the truth behind the mysteries like Sasha Blouse?",
            "How optimistic are you about the future like Connie Springer?",
        ];

        foreach ($questions as $order => $text) {
            Question::create([
                'survey_id' => $survey->id,
                'text' => $text,
                'order' => $order + 1,
            ]);
        }

    }
}
