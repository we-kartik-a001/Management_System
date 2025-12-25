<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'duration',
    ];

    public function collegeStudent()
    {
        return $this->belongsTo(CollegeStudent::class);
    }

    public function teacher()
    {
        return $this->belongsto(Teacher::class);
    }

     public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'courses_subjects', 'course_id', 'subject_id');
    }
}
