<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\UserSurveyCompleted;

class DashboardController extends Controller
{
    public function index()
    {

        //Users who completed the survey
        $completedUsers = UserSurveyCompleted::pluck('user_id')->all();

        //All users registered
        $allUsers = User::all();

         // Obtener la lista de usuarios que NO han completado el survey
        $uncompletedUsers = User::whereNotIn('id', $completedUsers)->get();

        return Inertia::render('Dashboard', [
            'uncompletedUsers' => $uncompletedUsers,
        ]);
    }
}
