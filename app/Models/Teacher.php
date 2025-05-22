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
        'age',
        'courses_id',
        'created_by'
    ];

    // Each student belongs to particiular one course
    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    // Many teacher belongs to many college student
    public function collegeStudents()
    {
        return $this->belongsToMany(CollegeStudent::class,'student_teachers','teachers_id','college_student_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
