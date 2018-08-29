<?php

namespace App\Http\Controllers\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Models
use App\Models\Question;

class QuestionController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function postQuestion(Request $request) {
    	$request->validate([
    		'questionaire_name' => 'required',
    		'duration' => 'required|numeric'
    	]);
    	
    	$new = Question::create([
    		'question_name' => $request->questionaire_name,
    		'duration' => $request->duration,
    		'duration_type' => $request->duration_type,
    		'resumable' => $request->resume
    	]);

    	$request->session()->flash('success', 'Questionnaire created successfully!');
    	return redirect()->back();
    }

    public function newQuestionsView() {
    	return view('add_question');
    }

    public function delete(Request $request, $id) {
    	$delete = Question::where('id', $id)->delete();

    	if ($delete) {
    		$request->session()->flash('success', 'Deleted successfully!');
    	}
    	return redirect()->back();
    }
}
