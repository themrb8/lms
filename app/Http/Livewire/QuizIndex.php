<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz;

class QuizIndex extends Component
{
    public function render()
    {
        $quiz = Quiz::all();
        return view('livewire.quiz-index', [
            'quiz' => $quiz,
        ]);
    }
}
