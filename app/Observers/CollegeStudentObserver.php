<?php

namespace App\Observers;

use App\Models\CollegeStudent;

class CollegeStudentObserver
{
    /**
     * Handle the CollegeStudent "created" event.
     */
    public function created(CollegeStudent $collegeStudent): void
    {
        //
    }

    /**
     * Handle the CollegeStudent "updated" event.
     */
    public function updated(CollegeStudent $collegeStudent): void
    {
        //
    }

    /**
     * Handle the CollegeStudent "deleted" event.
     */
    public function deleted(CollegeStudent $collegeStudent): void
    {
        //
    }

    /**
     * Handle the CollegeStudent "restored" event.
     */
    public function restored(CollegeStudent $collegeStudent): void
    {
        //
    }

    /**
     * Handle the CollegeStudent "force deleted" event.
     */
    public function forceDeleted(CollegeStudent $collegeStudent): void
    {
        //
    }
}
