<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use App\Models\Curriculam;

class CourseIndex extends Component
{
    public function render()
    {
        $curriculams = Curriculam::all();
        $courses = Course::all();
        return view('livewire.course-index', [
            'courses' => $courses,
            'curriculams' => $curriculams,
        ]);
    }
}
