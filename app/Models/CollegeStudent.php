<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeStudent extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'courses_id', 
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'courses_id');
    }

    // Many teacher belongs to many college student
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'student_teachers','college_student_id','teachers_id');
    }
}
