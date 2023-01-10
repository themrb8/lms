<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use App\Models\Curriculum;

class CourseIndex extends Component
{
    public function render()
    {
        $curriculums = Curriculum::all();
        $courses = Course::all();
        return view('livewire.course-index', [
            'courses' => $courses,
            'curriculums' => $curriculums,
        ]);
    }
}
