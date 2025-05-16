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

    public function course()
    {
        return $this->belongsTo(CollegeStudent::class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
}
