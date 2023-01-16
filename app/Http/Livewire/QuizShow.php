<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class QuizShow extends Component
{
    public $quiz;
    public $answer;

    public $answerOpitons = [
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
     ];

    public $answered = [];
    public $answer_id;
    public $countCorrectAnswer = 0;
    public $countIncorrectAnswer = 0;
    public $correct_answers = [];


    use WithPagination;
    
    public function render()
    {
        return view('livewire.quiz-show');
    }

    public function check() {
        $question_id = explode(',', $this->answer)[1];
        $question = Question::findOrFail($question_id);

        if($question->correct_answer == explode(',', $this->answer)[0]) {
            flash()->addSuccess('Correct answer');
            $correct = true;
            $this->countCorrectAnswer++;
        }else {
            flash()->addError('Wrong answer');
            $correct = false;
            $this->countIncorrectAnswer++;
        }

        $this->answered[$question->id] = $correct;
    }
}
