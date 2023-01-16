<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index() {
        return view('quiz.index');
    }
    public function create() {
        return view('quiz.create');
    }
    public function edit(Quiz $quiz) {
        return view('quiz.edit', [
            'quiz' => $quiz,
        ]);
    }

    public function store(Request $request) {
        $quiz = Quiz::create([
            'name' => $request->name,
        ]);

        return redirect()->route('quiz.show', $quiz->id);
    }

    public function show(Quiz $quiz) {
        return view('quiz.show', [
            'quiz' => $quiz,
        ]);
    }

    public function quizShow($id) {
        $quiz = Quiz::findOrFail($id);
        return view('quiz.quiz-show', [
            'quiz' => $quiz,
        ]);
    }

}
