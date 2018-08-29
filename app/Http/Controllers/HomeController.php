<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getQuestions() {
        $questions = Question::all();
        return view('questionaire', compact('questions'));
    }

    public function getQuestionsCreate() {
        return view('create');
    }
}
