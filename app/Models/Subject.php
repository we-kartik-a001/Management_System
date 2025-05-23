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


    public function course()
    {
        return $this->hasMany(Subject::class,'courses_subjects','subject_id','course_id ');
    }
    
    public function teacher()
    {
         return $this->belongsToMany(Teacher::class,'courses_subjects','subject_id','course_id ',);
    }
}
