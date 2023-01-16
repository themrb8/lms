<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'week_day',
        'class_time',
        'end_date',
    ];
    protected $table = 'curriculums';

    public function homeworks() {
        return $this->hasMany(Homework::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function notes() {
        return $this->belongsToMany(Note::class, 'curriculum_note');
    }

    public function presentStudents() {
        return Attendance::where('curriculum_id', $this->id)->count();
    }
}
