<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curriculum;
use App\Models\Course;

class CourseShow extends Component
{
    public $course_id;
    public function render()
    {
        $curriculum = Curriculum::where('course_id', $this->course_id)->get();
        $course = Course::where('id', $this->course_id)->get();
        return view('livewire.course-show', [
            'curriculum' => $curriculum,
            'course' => $course,
        ]);
    }
}
