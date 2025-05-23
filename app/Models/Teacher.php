<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'courses_id',
        'created_by'
    ];

    // Each student belongs to particiular one course
    public function courses()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    // Many teacher belongs to many college student
    public function collegeStudents()
    {
        return $this->belongsToMany(CollegeStudent::class, 'student_teachers', 'teachers_id', 'college_student_id');
    }

    // User which created the teacher
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    // accessor
    public function getDateOfBirthAttribute($value)
    {
        return date("d-M-Y", strtotime($value));
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teachers__subjects', 'teacher_id', 'subject_id');
    }
}
