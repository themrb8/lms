<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\Models\Course;
use App\Models\Curriculum;

class CourseEdit extends Component
{

    public $course_id;
    public $name;
    public $description;
    public $price;
    public $end_date;
    public $time;
    public $days = [
        'sunday',
        'monday',
        'thuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
    ];
    public $selectedDays = [];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'selectedDays' => 'required',
        'time' => 'required',
    ];


    public function mount() {
        $course = Course::where('id', $this->course_id)->with('curriculums')->first();
        $this->name = $course->name;
        $this->description = $course->description;
        $this->price = $course->price;

        if(!empty(count($course->curriculums))) {
            $this->time = $course->curriculums[0]->class_time;
            $this->end_date = $course->curriculums[0]->end_date;


            foreach($course->curriculums as $curriculum) {
                $this->selectedDays[] = $curriculum->week_day;
            }
        }
    }


    public function render()
    {
        return view('livewire.course-edit');
    }


    public function formSubmit() {
        $this->validate();

        $course = Course::where('id', $this->course_id)->with('curriculums')->first();

        foreach ($course->curriculums as $curriculumn) {
            $course->curriculums()->delete($course->id);
        }

        $course->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id
        ]);

        $i = 1;
        $start_date = new DateTime(Carbon::now());
        $endDate =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $endDate);

        foreach ($date_range as $date) {
            foreach ($this->selectedDays as $day) {
                if ($date->format("l") === ucfirst($day)) {
                    Curriculum::create([
                        'name' => $this->name . ' ' . $i++,
                        'week_day' => $day,
                        'class_time' => $this->time,
                        'end_date' => $this->end_date,
                        'course_id' => $course->id,
                    ]);
                }
            }
        }
        $i++;

        flash()->addSuccess('Course updated!');
        return redirect()->route('course.index');

    }
}
