<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use App\Models\Curriculum;

class CourseIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $curriculums = Curriculum::all();
        $courses = Course::paginate(12);
        return view('livewire.course-index', [
            'courses' => $courses,
            'curriculums' => $curriculums,
        ]);
    }


    public function courseDelete($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        flash()->addSuccess('Course deleted!');
    }
}
