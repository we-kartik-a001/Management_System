<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillabel =[
        'course_id',
        'name',
        'description'
    ];

    /**
     * Subject belongs to many courses
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_subjects', 'subject_id', 'course_id');
    }
    
    /**
     * subject bleongs to many teachers
     */
    public function teacher()
    {
         return $this->belongsToMany(Teacher::class,'teacher_subjects','subject_id','teacher_id ',);
    }
}
